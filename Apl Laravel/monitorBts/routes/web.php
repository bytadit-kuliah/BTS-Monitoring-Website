<?php
// use App\Models\Owner;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BtslistController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\SurveyorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::redirect('/', destination:'login'); //auto redirect into login url

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/dashboard', function(){
//     return view('dashboard.index');
// })->middleware('auth');

// Route::resource('/dashboard/edit-bts', BTSController::class)->middleware('auth');

Route::resource('/dashboard/owners', OwnerController::class)->middleware('auth');
Route::resource('/dashboard/btslists', BtslistController::class)->middleware('auth');

// Route::get('/dashboard/btslists/{id}/create', [BtslistController::class, 'store']);


// Route::post('store', 'BTSController@store')->name('store.uploadBTSPhotos')->middleware('auth');

// Route::put('/dashboard/edit-bts/{id}/edit','BTSController@update')->name('bts.update');

// Route::resource('/dashboard/edit-owner', OwnerController::class)->middleware('auth');
