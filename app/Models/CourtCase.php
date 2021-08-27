<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCase extends Model
{
    use HasFactory;

    protected $fillable = ['total_amount', 'name', 'court_id', 'client_id'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function expenses()
    {
        return $this->hasMany(CasePayment::class)->where('type', 'Expenses');
    }

    public function payments()
    {
        return $this->hasMany(CasePayment::class)->where('type', 'Payment');
    }

    public function commissions()
    {
        return $this->hasMany(CasePayment::class)->where('type', 'Commission');
    }

    public function getTotalExpensesAttribute()
    {
        return $this->expenses->sum('amount');
    }

    public function getTotalPaidAttribute()
    {
        return $this->payments->sum('amount');
    }

    public function getTotalCommissionsAttribute()
    {
        return $this->commissions->sum('amount');
    }

    public function getTotalPendingAttribute()
    {
        return $this->total_amount -  $this->total_paid;
    }

}
