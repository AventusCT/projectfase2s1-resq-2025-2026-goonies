<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Product.php
class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productid';

    protected $fillable = [
        'name',
        'description',
        'location',
        'status',
        'last_used',
        'used_by',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'used_by');
    }
}
