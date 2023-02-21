<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'no',
        'value',
        'status'
    ];
    public function customfield(){
        return $this->hasOne(CustomField::class,'field_id');
    }
}
