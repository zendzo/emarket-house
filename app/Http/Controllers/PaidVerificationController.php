<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angsuran;

class PaidVerificationController extends Controller
{
    public function verifiedPayment(Request $request,$id)
    {
        $angsuran = Angsuran::findOrfail($id);

        $rumah = $angsuran->rumah;

        $angsuran->verified = true;

        $verified = $angsuran->save();

        if ($verified) {
            if ($rumah->angsurans->count() < 10) {
                $rumah->angsurans()->create([
                    'rumah_id' => $rumah->id,
                    'kode' => strtoupper(str_random(8)),
                    'total' => $rumah->harga * 0.1 / 10,
                    'tanggal_tempo' => $angsuran->tanggal_tempo->addMonth()
                ]);
            }

            return redirect()->back()->with('message', 'Angusran Telah Diverfikasi!')
                    ->with('status','Data Successfully Verified!')
                    ->with('type','success');
        }
    }
}
