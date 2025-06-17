<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    // public function index()
    // {
    //     $product = new Product();
    //     $product->name = "Ordinateur portable";
    //     $product->category = 'Informatique';
    //     $product->slug = 'ordinateur-portable';
    //     $product->description = 'voici la description de la marchandise';
    //     $product->price = '560.99';
    //     $product->status='in_stock';
    //     $product->quantity = '10';
    //     $product->save();
    //     return $product;
    // }

    public function index(){
        $products=Product::all();
        return $products;
    }
}
