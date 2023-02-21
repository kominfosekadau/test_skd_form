<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use App\Models\CustomTable;
use App\Models\CustomValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomValuedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCustomField = CustomField::get();
        $dataCustomTable = CustomTable::get();
        $dataCustomValue = CustomValue::get();
        // dd($dataCustomValue);
        return view('custom-value.index', [
            'dataCustomFields' => $dataCustomField,
            'dataCustomTables' => $dataCustomTable,
            'dataCustomValues'=>$dataCustomValue,
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
        $data = request()->all();
        foreach ($data as $field_id => $value) {
            $n_row=CustomValue::where('field_id',$field_id)->count();
            $no_row=$n_row + 1;
            // dd($no_row);

            if (!is_numeric($field_id)) {
                continue;
            }

            $valueCustom = CustomValue::create([
                'field_id' => $field_id,
                'no' => $no_row,
                'value' => $value,
            ]);
        }
        $dataCustomField = CustomField::get();
        $dataCustomTable = CustomTable::get();
        $dataCustomValue = CustomValue::get();
        
        return view('custom-value.index', [
            'dataCustomFields' => $dataCustomField,
            'dataCustomTables' => $dataCustomTable,
            'dataCustomValues'=>$dataCustomValue,
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
        $tableName=$dataCustomTable = CustomTable::find($id);
        $dataTH=$dataCustomField = CustomField::where('table_id',$id)->get();
        $n_rowSpan=count($dataTH)+1;
        $values=DB::table('custom_values')
            ->join('custom_fields','custom_fields.id','=','custom_values.field_id')
            ->join('custom_tables','custom_tables.id','=','custom_fields.table_id')
            ->select('custom_values.*')
            ->where('custom_tables.id','=',$id)
            // ->groupBy('custom_values.no')
            ->orderBy('custom_values.id','Asc')
            ->get();
        // dd(count($values));
        
        foreach($values as $item){
            $no=$item->no;
        }

        return view('custom-value.show', [
            'table_name' => $tableName->title,
            'n_rowSpan' => $n_rowSpan,
            'values' => $values,
            'dataTH' => $dataTH,
            'no'    => $no,
        ]);
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
