<?php

namespace App\Traits;

trait JsonResponseTrait
{
    public function jsonResponse($status = "success", $data = [])
    {
        return response()->json(array_merge([
            "status" => $status,
        ], $data));
    }
}
