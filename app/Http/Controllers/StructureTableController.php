<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomTable;
use App\Models\StrukturTable;
use App\Models\TypeData;
use App\Models\TypeForminput;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class StructureTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $table=CustomTable::find($id);
        $structureTable=StrukturTable::where('table_id',$id)->get();
        // dd($structureTable);
        $dataTypes=TypeData::get();
        $formInputTypes=TypeForminput::get();
        
        return view('structure-table.index',[
            'table' => $table,
            'structureTables' => $structureTable,
            'dataTypes' => $dataTypes,
            'formInputTypes' => $formInputTypes,
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
        $strukturTable = StrukturTable::create([
            'table_id'=>$request->table_id,
            'name' => $request->name,
            'type_data' => $request->data_type,
            'length' => $request->length,
            'type_forminput' => $request->form_input_type,
            'is_nullable' => $request->nullable,
            'default' => $request->default,
        ]);

        $table=CustomTable::find($request->table_id);
        $structureTable=StrukturTable::where('table_id',$request->table_id)->get();
        $dataTypes=TypeData::get();
        $formInputTypes=TypeForminput::get();
        
        return view('structure-table.index',[
            'table' => $table,
            'structureTables' => $structureTable,
            'dataTypes' => $dataTypes,
            'formInputTypes' => $formInputTypes,
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
    public function generateTable($id)
    {
        $table=CustomTable::find($id);
        $tableName =strtolower(str_replace(" ", "_", $table->title));
        
        $structureTables=StrukturTable::where('table_id',$id)->get();
        // dd($structureTables);
        // dd($structureTables);


        // Buat tabel baru dengan kolom yang diberikan
        Schema::create($tableName, function (Blueprint $table) {
            // Kolom id sebagai primary key
            $table->id();

            // Looping untuk menambahkan kolom sesuai dengan data yang diberikan
            foreach ($structureTables as $structureTable){
                $columnType=$structureTable->type_data;
                $columnName=strtolower(str_replace(" ", "_", $structureTable->name));

                $table->$columnType($columnName);
            }

            // Kolom created_at dan updated_at
            $table->timestamps();
        });

        return "Tabel $tableName berhasil dibuat!";
    }
}
