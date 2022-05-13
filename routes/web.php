<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/admin',[AdminController::class,'admin']);
/* product page */
Route::get('/product',[AdminController::class,'product']);
Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);
Route::get('/showproduct',[AdminController::class,'showproduct']);
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);
Route::get('/updateview/{id}',[AdminController::class,'updateview']);
Route::post('/updateproduct/{id}',[AdminController::class,'updateproduct']);
/* end product page */
Route::get('/search',[HomeController::class,'search']);
/* add to cart*/
Route::post('/addcart/{id}',[HomeController::class,'addcart']);
Route::get('/showcart',[HomeController::class,'showcart']);
Route::get('/delete/{id}',[HomeController::class,'deletecart']);
/* end add to cart*/

/* order */
Route::post('/order',[HomeController::class,'confirmorder']);
Route::get('/showorder',[AdminController::class,'showorder']);
Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);
//end order

/* product for home */
Route::get('/products',[HomeController::class,'productsDetails']);
/* end product product details */
Route::get('/about',[HomeController::class,'about']);
// team start 
Route::get('/addteam',[AdminController::class,'addteam']);
Route::post('/uploadteam',[AdminController::class,'uploadteam']);
Route::get('/showteam',[AdminController::class,'showteam']);
Route::get('/deleteteam/{id}',[AdminController::class,'deleteteam']);
Route::get('/updateteam/{id}',[AdminController::class,'updateteam']);
Route::post('/updateTeamData/{id}',[AdminController::class,'updateTeamData']);

//end team


Route::get('/contact', [App\Http\Controllers\ContactController::class, 'create'])->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
