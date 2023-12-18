<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource("product-category", ProductCategoryController::class);
// Route::middleware(['auth:api'])->group(function () {
// Route::prefix("v1")->group(function () {

//     // // Menampilkan semua kategori produk
//     // Route::get("product-category", [ProductCategoryController::class, 'index']);

//     // // Menampilkan satu kategori produk berdasarkan ID
//     // Route::get("product-category/{id}", [ProductCategoryController::class, 'show']);

//     // // Menyimpan kategori produk baru
//     // Route::post("product-category", [ProductCategoryController::class, 'store']);

//     // // Memperbarui kategori produk berdasarkan ID
//     // Route::put("product-category/{id}", [ProductCategoryController::class, 'update']);

//     // // Menghapus kategori produk berdasarkan ID
//     // Route::delete("product-category/{id}", [ProductCategoryController::class, 'destroy']);
// });