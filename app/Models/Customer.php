<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_country',
        'customer_state',
        'customer_city',
        'customer_union',
        'customer_address',
        'customer_zip',
        'customer_password',
    ];

    protected $attributes =[
        'customer_country' => 'BD',
        'customer_state' => 'Dhaka',
        'customer_city' => 'Dhaka',
        'customer_address' => 'Dhaka',
        'customer_zip' => '1000',
        'customer_phone' => '01700000000',
        'customer_union' => 'Dhaka',
    ];
}
