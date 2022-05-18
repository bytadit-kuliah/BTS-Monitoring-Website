<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyorController;

// use App\Models\admin;
// use App\Models\answer;
// use App\Models\answer_option;
// use App\Models\bts_photo;
// use App\Models\bts;
// use App\Models\configuration;
// use App\Models\edit_answer;
// use App\Models\edit_bts;
// use App\Models\edit_survey;
// use App\Models\jenis_bts;
// use App\Models\kecamatan;
// use App\Models\monitoring;
// use App\Models\owner;
// use App\Models\question;
// use App\Models\riwayat_survey;
// use App\Models\survey;
// use App\Models\surveyor;
// use App\Models\user_log;
// use App\Models\User;
// use App\Models\village;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/btslist', function () {
    return view('btslist');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/btsmonitor', function () {
    return view('btsmonitor');
});

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/admin', function () {
//     return view('dashboardAdmin');
// });

Route::get('/surveyor', function () {
    return view('surveyor.index');
})->middleware('auth');

Route::get('/admin/edit-bts', function () {
    return view('admin.editBTSInfo');
})->middleware('auth');

Route::get('/admin/edit-pemilik', function () {
    return view('admin.editBTSPemilik');
})->middleware('auth');

Route::get('/admin/edit-wilayah', function () {
    return view('admin.editBTSWilayah');
})->middleware('auth');

Route::get('/admin/edit-surveyor', function () {
    return view('admin.editSurveyor');
})->middleware('auth');

// Route::get('/admin/edit-config', function () {
//     return view('editConfig');
// });

Route::get('/admin/list-survey', function () {
    return view('admin.editListSurvey');
})->middleware('auth');

// Route::get('/admin/edit-profile', function () {
//     return view('admin.editProfileAdmin');
// });

Route::get('/surveyor/edit-profile', function () {
    return view('surveyor.editProfileSurveyor');
})->middleware('auth');

Route::get('/surveyor/edit-jawaban-survey', function () {
    return view('surveyor.editJawabanSurvey');
})->middleware('auth');

Route::get('/surveyor/isi-survey', function () {
    return view('surveyor.isiSurvey');
})->middleware('auth');

Route::get('/surveyor/info-bts', function () {
    return view('surveyor.listBTSInfo');
})->middleware('auth');

Route::get('/admin/pesan', function () {
    return view('admin.messageList');
})->middleware('auth');

Route::get('/surveyor/monitoring', function () {
    return view('surveyor.monitoringSurveyor.index');
})->middleware('auth');

Route::get('/admin/buat-survey', function () {
    return view('admin.newSurvey');
})->middleware('auth');

Route::get('surveyor/survey', function () {
    return view('surveyor.surveyList');
})->middleware('auth');

Route::get('/thanks', function () {
    return view('thanks');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin', function(){
    return view('admin.index');
})->middleware('auth');

Route::get('/admin/edit-profile', function(){
    return view('admin.editProfileAdmin');
})->middleware('auth');

Route::get('/admin/edit-config', function () {
    return view('admin.editConfig');
})->middleware('auth');

// Route::get('/surveyor', [SurveyorController::class, 'index']);
Route::get('/surveyor', function(){
    return view('surveyor.index');
})->middleware('auth');
