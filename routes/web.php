<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get("/", [ProductController::class, 'index'])->name("products");
Route::post("/add/product", [ProductController::class, 'store'])->name("add.product");
Route::put("/update/product", [ProductController::class, 'update'])->name("update.product");
