<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'amount_paid',
        'change',
    ];

    // Relasi ke model Order, jika dibutuhkan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
