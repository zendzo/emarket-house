<?php

namespace App\Http\Controllers;

use App\RumahType;
use Illuminate\Http\Request;

class RumahTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahType = RumahType::all();

        return view('administrator.type-rumah.index', compact('RumahType'));
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
        try{
            RumahType::create($request->all());
                return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','error')
                ->with('type','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RumahType  $rumahType
     * @return \Illuminate\Http\Response
     */
    public function show(RumahType $rumahType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RumahType  $rumahType
     * @return \Illuminate\Http\Response
     */
    public function edit(RumahType $rumahType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RumahType  $rumahType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rumahType = RumahType::findOrfail($id);
        try{

        $rumahType->update($request->all());
        
        return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');
        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RumahType  $rumahType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumahType $rumahType)
    {
        //
    }
}
