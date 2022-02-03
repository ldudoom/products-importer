<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return ProductResource::collection(Product::all());
    }
}
