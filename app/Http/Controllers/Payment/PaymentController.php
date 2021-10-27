<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\Slot;
use App\Models\SlotBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Traits\ZoomApi;
use Illuminate\Support\Facades\Auth;

// use App\Traits\ChatConversation;

class PaymentController extends Controller
{
    use ZoomApi;
    // use ChatConversation;

    public function videoSession(Request $request)
    {
        $request->validate([
            'slotId' => 'required|numeric|min:1',
            'amount' => 'required',
            'userId' => 'required|numeric|min:1',
        ], [
            'userId.required' => 'You have to login first'
        ]);

        $bookingChk = SlotBooking::where([['userId', $request->userId], ['slotId', $request->slotId]])->count();
        $slot = Slot::select('teacherId', 'date', 'time', 'availability')->where('id', $request->slotId)->first();
        $user = User::select('name')->where('id', $request->userId)->first();

        $teacherId = $slot->teacherId;
        $user_id = Auth::user()->id;

        if ($bookingChk > 0) {
            return redirect()->route('front.purchase.success')->with('error', 'Session purchased already');
        } else {
            DB::beginTransaction();

            try {
                // slot book
                $slotBooking = new SlotBooking();
                $slotBooking->userId = $request->userId;
                $slotBooking->slotId = $request->slotId;
                $slotBooking->transactionId = 'TXN_'.uniqid().''.date('ymdhis');
                // $slotBooking->save();

                // zoom
                $zoomRequest = new Request([
                    'topic' => 'Meeting with '.$slot->expertDetails->name.' and '.$user->name,
                    'start_time' => $slot->date.' '.$slot->time,
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
                    ['message_from', $user_id],
                    ['message_to', $teacherId]
                ])
                ->orWhere([
                    ['message_to', $user_id],
                    ['message_from', $teacherId]
                ])
                ->count();

                if ($convo_chk_count == 0 && $teacherId != $user_id) {
                    $conversation = new Conversation;
                    $conversation->message_from = $user_id;
                    $conversation->message_to = $teacherId;
                    $conversation->save();
                }

                // notification
                $adminMessage = $user->name.' purchased video session dated on '.$slot->date.' at '.$slot->time;
                $expertMessage = $user->name.' purchased your video session dated on '.$slot->date.' at '.$slot->time;
                $userMessage = 'video session dated on '.$slot->date.' at '.$slot->time;

                // NOTIFICATION - params - (sender, receiver, type, title, message, route)
                // admin notification
                createNotification($teacherId, 1, 'video_session_purchase', 'Video session purchase', $adminMessage, 'user.sessions.index');
                // expert notification
                createNotification($request->userId, $teacherId, 'video_session_purchase', 'Video session is purchased', $expertMessage, 'user.sessions.index');
                // user notification
                createNotification($teacherId, $request->userId, 'video_session_purchase', 'Thanks for purchasing Video session', $userMessage, 'user.sessions.index');

                DB::commit();
                return redirect()->route('front.purchase.success')->with('success', 'Payment successful');
            } catch(Exception $e) {
                DB::rollback();
                return (object)[];
            }
        }
    }

    public function orderSuccess(Request $request)
    {
        return view('front.purchase-response');
    }
}
