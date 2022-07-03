<?php
// use App\Models\Owner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\MysurveyController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BtslistController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\UserController;


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

Route::get('/', function(){
    return view('index')->with('title','BTS Diskominfo Surakarta');
})->name('landing');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/owners', OwnerController::class)->middleware('auth');
Route::resource('/dashboard/monitorings', MonitoringController::class)->middleware('auth');
Route::resource('/dashboard/providers', ProviderController::class)->middleware('auth');
Route::resource('/dashboard/btslists', BtslistController::class)->middleware('auth');
Route::get('/dashboard/btslists/getVillages/{selectedKecamatanID}', [BtslistController::class, 'getVillages'])->middleware('auth');
Route::resource('/dashboard/configs', ConfigController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/mysurveys', MysurveyController::class)->middleware('auth');

Route::get('/dashboard/users', [UserController::class, 'index'])->middleware('is_admin');
Route::get('/dashboard/users/{user}/promote', [UserController::class, 'promote'])->middleware('is_admin');
Route::resource('/dashboard/surveys', SurveyController::class)->middleware('auth');
Route::resource('/dashboard/answers', AnswerController::class)->middleware('auth');

