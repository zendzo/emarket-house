<?php

namespace App\Http\Controllers;

use App\PhotoRumah;
use Illuminate\Http\Request;

class UploadPhotoRumahController extends Controller
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
        try{
            $photo = PhotoRumah::create([
                'description' => $request->get('description'),
                'rumah_id' => $request->get('rumah_id'),
            ]);

            if ($request->hasFile('photo')) {
                $photo->addMediaFromRequest('photo')->toMediaCollection('photo');
            }

            if ($photo) {
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
     * @param  \App\PhotoRumah  $photoRumah
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoRumah $photoRumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhotoRumah  $photoRumah
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoRumah $photoRumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhotoRumah  $photoRumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoRumah $photoRumah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhotoRumah  $photoRumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoRumah $photoRumah)
    {
        //
    }
}
