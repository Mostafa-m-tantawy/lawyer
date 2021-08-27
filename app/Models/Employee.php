<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','email','address','phone','national_id','passport_id','profession_id','profession','phone','starting_date','salary',];

}
