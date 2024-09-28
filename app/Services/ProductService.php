<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * Get paginated products.
     *
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedProducts($limit = 5)
    {
        return Product::latest()->paginate($limit);
    }

    /**
     * Store a new product.
     *
     * @param array $data
     * @return \App\Models\Product
     */
    public function storeProduct(array $data)
    {
        return Product::create($data);
    }

    /**
     * Update an existing product.
     *
     * @param \App\Models\Product $product
     * @param array $data
     * @return bool
     */
    public function updateProduct(Product $product, array $data)
    {
        return $product->update($data);
    }

    /**
     * Delete a product.
     *
     * @param \App\Models\Product $product
     * @return bool|null
     */
    public function deleteProduct(Product $product)
    {
        return $product->delete();
    }


    
    public function searchProducts($searchTerm, $limit = 5)
    {
        if (empty($searchTerm)) {
            return $this->getPaginatedProducts($limit);
        }

        return Product::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('price', 'like', '%' . $searchTerm . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }
}
