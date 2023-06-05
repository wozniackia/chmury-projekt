<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'booked_at',
        'duration_in_days',
        'payment_method',
    ];

    public $timestamps = false;
}
