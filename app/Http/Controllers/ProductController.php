<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view("products", compact("products"));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        Product::create($validatedData);

        return response()->json([
            "status" => "success",
        ]);
    }

    public function update(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        Product::where('id', $request->id)->update($validatedData);

        return response()->json([
            "status" => "success",
        ]);
    }
}
