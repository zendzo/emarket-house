<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rumah;

class BookingRumahController extends Controller
{
    public function booking(Request $request)
    {
        $rumah = Rumah::findOrfail($request->get('rumah_id'));

        try{
            $data = $rumah->update([
                'booked_by' => $request->get('booked_by'),
            ]);

            if ($data) {
                $user = User::findOrFail($request->get('booked_by'));
                
                // todo upload taggihan
                $rumah->angsurans()->create([
                    'rumah_id' => $request->get('rumah_id'),
                    'kode' => strtoupper(str_random(8)),
                    'total' => $rumah->harga * 0.1 / 10,
                    'tanggal_tempo' => $user->created_at->addMonths(1)
                ]);

                return redirect()->back()->with('message', 'Proses Booking Berhasil!')
                    ->with('status','Data Successfully Saved!')
                    ->with('type','success');
            }

            }catch (\Exception $e){
                return redirect()->back()->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error')
                        ->withInput();
            }
    }
}
