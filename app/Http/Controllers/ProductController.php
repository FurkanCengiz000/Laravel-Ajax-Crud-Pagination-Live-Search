<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view("products", compact("products"));
    }

    public function store(CreateProductRequest $request)
    {
        $validatedData = $request->validated();
        Product::create($validatedData);
        
        return response()->json([
            "status" => "success",
        ]);
    }
}
