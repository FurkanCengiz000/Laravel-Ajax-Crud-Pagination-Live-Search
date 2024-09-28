<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\JsonResponseTrait;
use App\Traits\ProductSearchTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use JsonResponseTrait, ProductSearchTrait;

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getPaginatedProducts();
        return view("products", compact("products"));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $this->productService->storeProduct($validatedData);

        return $this->jsonResponse("success");
    }

    public function update(ProductFormRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $this->productService->updateProduct($product, $validatedData);

        return $this->jsonResponse("success");
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return $this->jsonResponse("success");
    }

    public function pagination(Request $request)
    {
        $products = $this->productService->getPaginatedProducts();
        return view("partials.table", compact("products"))->render();
    }
    
    public function search(ProductSearchRequest $request)
    {
        $searchTerm = $request->sanitize();
        $products = $this->productService->searchProducts($searchTerm);

        return $this->prepareResponse($products);
    }
}
