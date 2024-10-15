<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class STKrequest extends Model
{
    use HasFactory;
     // Allow mass assignment for these fields
     protected $fillable = [
        'phone',
        'amount',
        'reference',
        'description',
        'MerchantRequestID',
        'CheckoutRequestID',
        'status',
    ];
    
}
