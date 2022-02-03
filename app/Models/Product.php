<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $collection = 'products';

    protected $fillable = [
        'category',
        'supplier',
        'product_data',
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];


}
