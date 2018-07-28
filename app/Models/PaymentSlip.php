<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSlip extends Model
{
	protected $table = 'payment_slip';
	protected $fillable = ['file_name','property_id','booking_id', 'status'];
}