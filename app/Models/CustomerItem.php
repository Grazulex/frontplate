<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'item_id',
        'quantity'
    ];
}
