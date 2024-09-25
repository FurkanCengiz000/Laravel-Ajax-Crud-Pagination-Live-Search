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
}
