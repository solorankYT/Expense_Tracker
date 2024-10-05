<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['expense_id', 'payment_method', 'amount', 'date'];

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
