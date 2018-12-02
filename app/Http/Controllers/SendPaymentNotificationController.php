<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PaymentNotification;
use App\Angsuran;

class SendPaymentNotificationController extends Controller
{
    public function sendToAll()
    {
        $angsurans = Angsuran::where('paid', false)->get();

        $user = [];
        foreach ($angsurans as $angsuran) {

            $user = $angsuran->rumah->bookedBy;

            $angsuran->rumah->bookedBy->notify(new PaymentNotification($angsuran,$user));

            // array_push($user,$an->rumah->bookedBy->email);
        }
        return redirect()->back()->with('message', 'Notifikasi Telah Dikirm!')
                    ->with('status','Data Successfully Sent!')
                    ->with('type','success');
    }

    public function sendTo($id)
    {
        $angsuran = Angsuran::findOrFail($id);
        
        if($angsuran){
            $user = $angsuran->rumah->bookedBy;

            $angsuran->rumah->bookedBy->notify(new PaymentNotification($angsuran,$user));
        }

        return redirect()->back()->with('message', 'Notifikasi Telah Dikirm!')
                    ->with('status','Data Successfully Sent!')
                    ->with('type','success');
    }
}
