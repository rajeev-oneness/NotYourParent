<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\Notification;
use App\Models\Slot;
use App\Models\SlotBooking;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Traits\ZoomApi;
use Exception;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use ZoomApi;

    public function storeStripePayment(Request $req)
    {
        $req->validate([
            'stripeToken' => 'required|string',
            'amount' => 'required',
            'redirectURL' => 'required|string',
            'currency' => 'required|string',
        ]);
        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        $payment = \Stripe\Charge::create([
            "amount" => 100 * $req->amount,
            "currency" => $req->currency,
            "source" => $req->stripeToken,
            "description" => "Test payment",
        ]);
        if ($payment->status == 'succeeded') {
            $newPayment = new Transaction();
            $newPayment->userId = $req->user()->id;
            $newPayment->transaction = $payment->id;
            $newPayment->order_id = emptyCheck($payment->balance_transaction);
            $newPayment->amount = $payment->amount;
            $newPayment->currency = emptyCheck($payment->currency);
            $newPayment->status = emptyCheck($payment->status);
            $newPayment->captured = emptyCheck($payment->captured);
            $newPayment->description = emptyCheck($payment->description);
            $newPayment->method = $payment->payment_method;
            $newPayment->amount_refunded = emptyCheck($payment->amount_refunded);
            $newPayment->refund_status = emptyCheck($payment->refunded);
            $newPayment->created_at_time = $payment->created;
            $newPayment->bank = $payment->payment_method_details->type;
            $newPayment->save();
            return redirect($req->redirectURL . '?transactionId=' . $newPayment->id);
        }
        $error['stripePaymentGateway'] = 'Something went wrong please try after some time';
        return back()->withErrors($error)->withInput($req->all());
    }

    public function videoSession(Request $request, $slotId = 0)
    {
        // dd($request->all());
        $user = $request->user();
        $transaction = Transaction::findOrFail($request->transactionId);
        $slot = Slot::findOrFail($slotId);
        $teacher = $slot->expertDetails;
        DB::beginTransaction();
        try {
            // transaction update
            $transaction->purchaseType = 'slot_bookings';
            $transaction->save();
            // slot book
            $slotBooking = new SlotBooking();
            $slotBooking->userId = $user->id;
            $slotBooking->slotId = $slotId;
            $slotBooking->transactionId = $transaction->id;
            // zoom
            $zoomRequest = new Request([
                'topic' => 'Meeting with ' . $teacher->name . ' and ' . $user->name,
                'start_time' => $slot->date . ' ' . $slot->time,
                'agenda' => '',
            ]);
            $zoomResponse = $this->create($zoomRequest);
            if ($zoomResponse) {
                $slotBooking->uuid = $zoomResponse->uuid;
                $slotBooking->meetingId = $zoomResponse->id;
                $slotBooking->host_id = $zoomResponse->host_id;
                $slotBooking->host_email = $zoomResponse->host_email;
                $slotBooking->topic = $zoomResponse->topic;
                $slotBooking->start_time = $zoomResponse->start_time;
                $slotBooking->agenda = ($zoomResponse->agenda ?? '');
                $slotBooking->join_url = $zoomResponse->join_url;
                $slotBooking->password = $zoomResponse->password;
                $slotBooking->encrypted_password = $zoomResponse->encrypted_password;
                $slotBooking->status = $zoomResponse->status;
                $slotBooking->type = $zoomResponse->type;
                $slotBooking->start_url = $zoomResponse->start_url;
                $slotBooking->remark = '';
                $slotBooking->over = 0;
            }
            $slotBooking->save();

            // slot availability
            $slotUpdate = Slot::findOrFail($request->slotId);
            $slotUpdate->availability = 0;
            $slotUpdate->save();

            // chat
            $convo_chk_count = Conversation::where([
                ['message_from', $user->id],
                ['message_to', $teacher->id]
            ])
                ->orWhere([
                    ['message_to', $user->id],
                    ['message_from', $teacher->id]
                ])
                ->count();

            if ($convo_chk_count == 0 && $teacher->id != $user->id) {
                $conversation = new Conversation;
                $conversation->message_from = $user->id;
                $conversation->message_to = $teacher->id;
                $conversation->save();
            }

            // notification
            $adminMessage = $user->name . ' purchased video session scheduled on ' . $slot->date . ' at ' . $slot->time;
            $expertMessage = $user->name . ' purchased your video session scheduled on ' . $slot->date . ' at ' . $slot->time;
            $userMessage = 'video session scheduled on ' . $slot->date . ' at ' . $slot->time;

            // NOTIFICATION - params - (sender, receiver, type, title, message, route)
            // admin notification
            createNotification($teacher->id, 1, 'video_session_purchase', 'Video session purchase', $adminMessage, 'user.sessions.index');
            // expert notification
            createNotification($user->id, $teacher->id, 'video_session_purchase', 'Video session is purchased', $expertMessage, 'user.sessions.index');
            createNotification($user->id, $teacher->id, 'video_session_purchase_chat', 'Now you can talk to ' . $user->name, $expertMessage, 'user.chat.index');
            // user notification
            createNotification($teacher->id, $user->id, 'video_session_purchase', 'Thanks for purchasing Video session', $userMessage, 'user.sessions.index');
            createNotification($teacher->id, $user->id, 'video_session_purchase_chat', 'Now you can talk to ' . $teacher->name, $userMessage, 'user.chat.index');
            DB::commit();
            return redirect()->route('front.purchase.success', ['type' => 'slot', 'slotBookingId' => $slotBooking->id])->with('success', 'Payment successful');
        } catch (Exception $e) {
            DB::rollback();
            return (object)[];
        }
    }

    public function caseStudy(Request $request, $courseId = 0)
    {
        $user = $request->user();
        $transaction = Transaction::findOrFail($request->transactionId);
        $course = Course::findOrFail($courseId);
        $teacher = $course->teacherDetail;
        DB::beginTransaction();

        try {
            // transaction update
            $transaction->purchaseType = 'course_purchases';
            $transaction->save();
            // course purchase
            $coursePurchase = new CoursePurchase();
            $coursePurchase->userId = $user->id;
            $coursePurchase->courseId = $courseId;
            $coursePurchase->transactionId = $transaction->id;
            $coursePurchase->save();
            // chat
            $convo_chk_count = Conversation::where([
                ['message_from', $user->id],
                ['message_to', $teacher->id]
            ])
                ->orWhere([
                    ['message_to', $user->id],
                    ['message_from', $teacher->id]
                ])
                ->count();

            if ($convo_chk_count == 0 && $teacher->id != $user->id) {
                $conversation = new Conversation;
                $conversation->message_from = $user->id;
                $conversation->message_to = $teacher->id;
                $conversation->save();
            }

            // notification
            $adminMessage = $user->name . ' purchased case study by ' . $teacher->name;
            $expertMessage = $user->name . ' purchased case study, ' . $course->name;
            $userMessage = 'case study purchased, ' . $course->name;

            // NOTIFICATION - params - (sender, receiver, type, title, message, route)
            // admin notification
            createNotification($teacher->id, 1, 'case_study_purchase', 'Case study purchase', $adminMessage, 'user.caseStudy.index');
            // expert notification
            createNotification($user->id, $teacher->id, 'case_study_purchase', 'Case study is purchased', $expertMessage, 'user.caseStudy.index');
            createNotification($user->id, $teacher->id, 'case_study_purchase_chat', 'Now you can talk to ' . $user->name, $expertMessage, 'user.chat.index');
            // user notification
            createNotification($teacher->id, $user->id, 'case_study_purchase', 'Thanks for purchasing Case study', $userMessage, 'user.caseStudy.index');
            createNotification($teacher->id, $user->id, 'case_study_purchase_chat', 'Now you can talk to ' . $teacher->name, $userMessage, 'user.chat.index');


            DB::commit();
            return redirect()->route('front.purchase.success', ['type' => 'course', 'courseId' => $course->id])->with('success', 'Payment successful');
        } catch (Exception $e) {
            DB::rollback();
            return (object)[];
        }
    }

    public function orderSuccess(Request $request)
    {
        if($request->type == 'slot') {
            $data = SlotBooking::findOrFail($request->slotBookingId);
        } else {
            $data = Course::findOrFail($request->courseId);
        }
        return view('front.purchase-response', compact('data', 'request'));
    }
}
