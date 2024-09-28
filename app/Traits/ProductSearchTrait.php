<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Product;

trait ProductSearchTrait
{
    private function prepareResponse($products)
    {
        if ($products->count() >= 1) {
            return view("partials.table", compact("products"))->render();
        }

        return response()->json([
            'status' => 'nothing_found'
        ]);
    }
}
