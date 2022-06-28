<?php
// use App\Models\Owner;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controller;
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
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function(){
    return view('index')->with('title','BTS Diskominfo Surakarta');
})->name('landing');

// Route::redirect('/', destination:'login'); //auto redirect into login url

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/dashboard', function(){
//     return view('dashboard.index');
// })->middleware('auth');

// Route::resource('/dashboard/edit-bts', BTSController::class)->middleware('auth');

Route::resource('/dashboard/owners', OwnerController::class)->middleware('auth');
Route::resource('/dashboard/monitorings', MonitoringController::class)->middleware('auth');
Route::resource('/dashboard/providers', ProviderController::class)->middleware('auth');
Route::resource('/dashboard/btslists', BtslistController::class)->middleware('auth');
// Route::resource('/dashboard/profiles', ProfileController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/mysurveys', MysurveyController::class)->middleware('auth');

// except('index')
// Route::put('/dashboard/users/{user}','UserController@update');
// Route::get('/dashboard/users/{user}/edit','UserController@edit');

Route::get('/dashboard/users', [UserController::class, 'index'])->middleware('is_admin');
Route::resource('/dashboard/surveys', SurveyController::class)->middleware('auth');
// Route::resource('/dashboard/btslists/surveys', SurveyController::class)->middleware('auth');
Route::resource('/dashboard/answers', AnswerController::class)->middleware('auth');

// Route::post('/dashboard/users', [UserController::class, 'store'])->middleware('auth'); // nyimpen data
// Route::get('/dashboard/users/create', [UserController::class, 'create'])->middleware('auth'); // nyimpen data
// Route::get('/dashboard/users/{user}', [UserController::class, 'show'])->middleware('auth'); // nyimpen data
// // Route::patch('/dashboard/users/{user}', [UserController::class, 'update'])->middleware('auth'); // nyimpen data
// Route::patch('/dashboard/users/{user}', [UserController::class, 'update'])->middleware('auth')->name('profile.update'); // nyimpen data
// Route::delete('/dashboard/users/{user}', [UserController::class, 'delete'])->middleware('auth'); // nyimpen data
// // Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name('profile.edit'); // nyimpen data
// Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth'); // nyimpen data

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('profile', 'ProfileController@edit')->name('profile.edit');
// });


// Route::get('/dashboard/users/{user}',  ['as' => 'dashboard.profile.edit', 'uses' => 'UserController@edit']);
// Route::patch('/dashboard/users/{user}/update',  ['as' => 'dashboard.profile.update', 'uses' => 'UserController@update']);

// Route::get('/dashboard/btslists/{id}/create', [BtslistController::class, 'store']);


// Route::post('store', 'BTSController@store')->name('store.uploadBTSPhotos')->middleware('auth');

// Route::put('/dashboard/edit-bts/{id}/edit','BTSController@update')->name('bts.update');

// Route::resource('/dashboard/edit-owner', OwnerController::class)->middleware('auth');
// Route::get('/dashboard/list-survey', function(){
//     return view('dashboard.admin.survey.index');
// })->middleware('auth');
// Route::get('/dashboard/show-survey', function(){
//     return view('dashboard.admin.survey.show');
// })->middleware('auth');
// Route::get('/dashboard/create-survey', function(){
//     return view('dashboard.admin.survey.create');
// })->middleware('auth');
