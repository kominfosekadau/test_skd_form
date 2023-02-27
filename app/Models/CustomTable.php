<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_published'
    ];
    public function customfield(){
        return $this->hasMany(CustomField::class);
    }
    public function strukturtable(){
        return $this->hasMany(StrukturTable::class);
    }
}
