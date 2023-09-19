<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/supplier_form_store', [Apicontroller::class, 'supplier_form_store']);
Route::get('/supplier_form_list', [Apicontroller::class, 'supplier_form_list']);
Route::get('/supplier_form_get/{id}', [Apicontroller::class, 'supplier_form_get']);
Route::get('/deleteformsupply/{id}', [Apicontroller::class, 'deleteformsupply']);
Route::post('/slip_store', [Apicontroller::class, 'slip_store']);
Route::get('/slip_list', [Apicontroller::class, 'slip_list']);
Route::get('/get_aadhar_list', [Apicontroller::class, 'get_aadhar_list']);