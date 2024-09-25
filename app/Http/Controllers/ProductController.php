<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\JsonResponseTrait;

class ProductController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $products = (new ProductService())->getPaginatedProducts();
        return view("products", compact("products"));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        Product::create($validatedData);

        return $this->jsonResponse("success");
    }

    public function update(ProductFormRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);

        return $this->jsonResponse("success");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $this->jsonResponse("success");
    }
}
