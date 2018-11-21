<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
