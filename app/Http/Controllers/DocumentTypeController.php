<?php

namespace App\Http\Controllers;

use App\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = DocumentType::all();

        return view('administrator.type-document.index', compact(['document']));
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
            DocumentType::create($request->all());
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
     * @param  \App\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentType $documentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = DocumentType::findOrfail($id);
        try{

        $document->update($request->all());
        
        if ($document) {
            return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');
        }
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
     * @param  \App\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentType $documentType)
    {
        //
    }
}
