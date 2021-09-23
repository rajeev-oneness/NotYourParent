<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SlotBooking;

class PaymentController extends Controller
{
    public function videoSession(Request $request)
    {
        $request->validate([
            'slotId' => 'required|numeric|min:1',
            'amount' => 'required',
            'userId' => 'required|numeric|min:1',
        ], [
            'userId.required' => 'You have to login first'
        ]);

        $slotBooking = new SlotBooking();
        $slotBooking->userId = $request->userId;
        $slotBooking->slotId = $request->slotId;
        $slotBooking->transactionId = 'TXN_'.uniqid().''.date('ymdhis');
        $slotBooking->save();

        return redirect()->route('front.purchase.success')->with('success', 'Payment successful');
    }

    public function orderSuccess(Request $request)
    {
        return view('front.purchase-response');
    }
}
