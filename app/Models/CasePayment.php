<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePayment extends Model
{
    use HasFactory;
    protected $fillable=['court_case_id','name','amount','type','payment_method','payment_date','percentage','note'];
}
