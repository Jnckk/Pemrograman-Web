<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// routes/api.php

use App\Http\Controllers\BrandMotorController;

Route::get('/brand_motor', [BrandMotorController::class, 'index']);
Route::get('/brand_motor/{id}', [BrandMotorController::class, 'show']);
Route::post('/brand_motor', [BrandMotorController::class, 'store']);
Route::put('/brand_motor/{id}', [BrandMotorController::class, 'update']);
Route::delete('/brand_motor/{id}', [BrandMotorController::class, 'destroy']);