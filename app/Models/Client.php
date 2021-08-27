<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','address','national_id','passport_id',];


    public function cases(){
        return $this->hasMany(CourtCase::class);
    }
}
