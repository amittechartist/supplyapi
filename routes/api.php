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
Route::get('/supplier_form_get_payment/{id}', [Apicontroller::class, 'supplier_form_get_payment']);
Route::get('/deleteformsupply/{id}', [Apicontroller::class, 'deleteformsupply']);
Route::post('/slip_store', [Apicontroller::class, 'slip_store']);
Route::get('/slip_list', [Apicontroller::class, 'slip_list']);
Route::get('/get_aadhar_list', [Apicontroller::class, 'get_aadhar_list']);
Route::post('/payment_handel', [Apicontroller::class, 'payment_handel']);
Route::get('/rez', [Apicontroller::class, 'rez']);
Route::get('/pay', [Apicontroller::class, 'pay']);
Route::post('/fundaccount_create', [Apicontroller::class, 'fundaccount_create']);

// ADMIN
Route::post('/register',[ApiController::class,'register']);
Route::post('/adminlogin',[ApiController::class,'adminlogin']);
// PRODUCT
Route::post('/addproduct',[ApiController::class,'addproduct']);
Route::get('/getproducts',[ApiController::class,'getproducts']);
Route::get('/getproductsnew',[ApiController::class,'getproductsnew']);
Route::get('/getproductsbycat',[ApiController::class,'getProductsByCat']);
Route::get('/getproductbyid/{id}',[ApiController::class,'getProductByID']);
Route::get('/deleteproduct/{id}',[ApiController::class,'deleteproduct']);
Route::get('/productedit/{pid}',[ApiController::class,'productedit']);
Route::get('/viewproduct/{pid}',[ApiController::class,'viewproduct']);
// CATEGORY
Route::post('/addcategory',[ApiController::class,'addcategory']);
Route::get('/categorylist',[ApiController::class,'categorylist']);
Route::get('/deletecategory/{id}',[ApiController::class,'deletecategory']);
Route::get('/editcategory/{id}',[ApiController::class,'editcategory']);
// WISHLIST
Route::post('/addtowishlist',[ApiController::class,'addtowishlist']);
Route::post('/checkout',[ApiController::class,'checkout']);


// WEBSITE
Route::post('/newregistration',[ApiController::class,'newregistration']);
Route::post('/login',[ApiController::class,'login']);
//USER
Route::get('/userprofile',[ApiController::class,'userprofile']);
Route::get('/con_email_edit/{id}',[ApiController::class,'con_email_edit']);
//ORDERS
Route::get('/orders',[ApiController::class,'orders']);
Route::post('/eway_bill_insert',[ApiController::class,'eway_bill_insert']);
Route::get('/eway_bill_list',[ApiController::class,'eway_bill_list']);
Route::get('/pdf_download/{id}',[ApiController::class,'pdf_download']);