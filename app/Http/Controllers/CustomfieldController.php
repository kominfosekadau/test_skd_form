<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomField;
use App\Models\CustomTable;

class CustomfieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataCustomField=CustomField::get();
        $dataCustomTable=CustomTable::get();

        // dd($dataCustomField->customtable);
        return view('custom-field.index',[
            'dataCustomFields' => $dataCustomField,
            'dataCustomTables' => $dataCustomTable,
        ]);
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
        // dd($request);
        $customfield = CustomField::create([
            'table_id' => $request->table,
            'label' => $request->name,
            'type' => $request->typedata,
            'is_required' => $request->required,
            
        ]);
        $dataCustomField=CustomField::get();
        $dataCustomTable=CustomTable::get();
        return back()->with([
            'dataCustomFields' => $dataCustomField,
            'dataCustomTables' => $dataCustomTable
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
