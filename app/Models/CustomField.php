<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'label',
        'type',
        'is_required'
    ];
    public function customvalue(){
        return $this->hasMany(CustomValue::class);
    }
    public function customtable(){
        return $this->hasOne(CustomTable::class,'table_id');
    }
}
