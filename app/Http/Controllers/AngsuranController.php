<?php

namespace App\Http\Controllers;

use App\Angsuran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try{
            $angsuran = Angsuran::create([
                'rumah_id' => $request->get('rumah_id'),
                'kode' => $request->get('kode'),
                'total' => $request->get('total'),
                'tanggal_bayar' => $request->get('tanggal_bayar'),
                'tanggal_tempo' => Carbon::createFromFormat('d-m-Y', $request->get('tanggal_bayar'))->addMonth()
            ]);

           if ($request->hasFile('document')) {
            $angsuran->addMediaFromRequest('document')->toMediaCollection('angsuran');
           }

            if ($angsuran) {
                return redirect()->back()->with('message', 'Upload Data Berhasil!')
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(Angsuran $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Angsuran $angsuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angsuran $angsuran)
    {
        //
    }
}
