<?php

namespace App\Http\Controllers;

use App\Rumah;
use Illuminate\Http\Request;
use App\User;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahs = Rumah::orderBy('id', 'DESC')->get();

        return view('administrator.rumah.index', compact('rumahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.rumah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $total = $request->get('total_unit');

            for ($i = 0; $i < $total; $i++) {
                Rumah::create([
                    'rumah_type_id' => $request->get('rumah_type_id'),
                    'perumahan_id' => $request->get('perumahan_id'),
                    'block' => $request->get('block'),
                    'number' => $request->get('unit_start') + $i,
                    'subsidi' => $request->get('subsidi'),
                    'harga' => $request->get('price'),
                ]);
            }

            return redirect()->route('admin.perumahan.show',$request->get('perumahan_id'))->with('message', 'Upload Data Berhasil!')
                ->with('status','Data Successfully Saved!')
                ->with('type','success');


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
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        $users = User::where('role_id',2)->get();

        $dp = $rumah->harga * 0.1;

        return view('administrator.rumah.show', compact(['rumah','users','dp']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        return view('administrator.rumah.edit', compact('rumah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        try{

            $rumah->rumah_type_id = $request->get('rumah_type_id');
            $rumah->perumahan_id = $request->get('perumahan_id');
            $rumah->block = $request->get('block');
            $rumah->number = $request->get('number');
            $rumah->subsidi = $request->get('subsidi');
            $rumah->harga = $request->get('harga');
            $rumah->save();

            if($rumah){
                return redirect()->back()->with('message', 'Update Data Berhasil!')
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
    }

    public function userShow(Rumah $rumah)
    {
        if(is_null($rumah) || $rumah->booked_by !== auth()->id()){
            return redirect()->back()->with('message', 'Anda Belum Booking Rumah!')
                        ->with('status','Halaman Terbatas!')
                        ->with('type','error');
        }

        $dp = $rumah->harga * 0.1;

        return view('administrator.rumah.show', compact(['rumah','dp']));
    }
}
