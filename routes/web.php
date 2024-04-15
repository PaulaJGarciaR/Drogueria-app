<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\ProductController;
use App\Http\controllers\CustomerController;
use App\Http\controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//EJEMPLO DE RUTAS 

Route::get('/', function () {
return view('welcome');
});

// Route::get('/about', function () {
// return 'Acerca de nosotros';
// }); 

// Route::get('/user/{id}', function ($id) {
// return 'ID de usuario: ' . $id;
// }); 

// Route::get('/contacto', function () {
//     return 'Página de contacto';
//     })->name('contacto');

// Route::get('/usuario/{id}', function ($id) {
//    return 'ID de usuario: ' . $id;
//  })->where('id', '[0-9]{3}');

// Route::prefix('admin')->group(function () {
//   Route::get('/', function () {
//   return 'Panel de administración';
//   });
//   Route::get('/users', function () {
//   return 'Lista de usuarios';
//   });
// }); 
       

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//PRODUCTS CONTROLLER
Route::resource('products',ProductController::class);
//CUSTOMERS CONTROLLER 
Route::resource('customers',CustomerController::class);
//SALES CONTROLLER 
Route::resource('sales',SaleController::class);
});


