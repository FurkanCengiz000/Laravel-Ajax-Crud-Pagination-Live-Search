<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get("/", [ProductController::class, 'index'])->name("products");
Route::post("/add/product", [ProductController::class, 'store'])->name("add.product");
