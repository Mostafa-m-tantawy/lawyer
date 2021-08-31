<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralExpense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'type', 'amount', 'note','payment_date','payment_method'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
