<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'productid';

    protected $fillable = [
        'name',
        'description',
        'status',
        'last_used',
    ];

    protected $casts = [
        'last_used' => 'datetime',
    ];
}
