<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_id',
        'name',
        'type_data',
        'length',
        'type_forminput',
        'is_nullable',
        'default',
    ];
    public function customtable(){
        return $this->hasOne(CustomTable::class,'table_id');
    }
}
