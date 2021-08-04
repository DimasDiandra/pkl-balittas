<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TemplatesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;


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

Route::get('/', ['middleware' => 'guest', function () {
    return view('auth/login');
}]);

Auth::routes();

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/download', [TemplatesController::class, 'template_download']);
Route::get('/home/pengumuman/{id}', [HomeController::class, 'show_pengumuman']);



//Perencanaan
Route::get('/perencanaan', [PerencanaanController::class, 'perencanaan']);
Route::post('/perencanaan/proses', [PerencanaanController::class, 'perencanaan_upload']);
Route::get('/perencanaan/download', [PerencanaanController::class, 'perencanaan_download']);

Route::get('/revisi', function () {
    return view('revisi');
});

//report
Route::get('/report', [ReportController::class, 'report']);
Route::post('/report/upload', [ReportController::class, 'report_upload']);
Route::get('/report/download', [ReportController::class, 'report_download']);

Route::get('view', [App\Http\Controllers\FileController::class, 'getFile']);
Route::get('get/{filename}', [FileController::class, 'getfile']);

//Admin
Route::middleware('role:admin')->get('/admin', function () {
    return view('admin.home');
})->name('admin');
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.home', [HomeController::class, 'index']);
    })->name('admin');
    // List data User
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'delete']);

    //Projek User
    Route::get('/projek', [App\Http\Controllers\ProjekController::class, 'show']);
    Route::post('/projek/buat', [App\Http\Controllers\ProjekController::class, 'create']);
    Route::get('/projek/{id}', [App\Http\Controllers\ProjekController::class, 'edit']);
    Route::put('/projek/{id}', [App\Http\Controllers\ProjekController::class, 'update']);
    Route::delete('/projek/{id}', [App\Http\Controllers\ProjekController::class, 'delete']);

    // Pengumuman Admin
    Route::get('/pengumuman', [PengumumanController::class, 'show']);
    Route::post('/pengumuman', [PengumumanController::class, 'store']);
    Route::get('/pengumuman/{id}', [PengumumanController::class, 'edit']);
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update']);
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'delete']);

    // Template Admin
    Route::get('template', [TemplatesController::class, 'show']);
    Route::post('template', [TemplatesController::class, 'store']);
    Route::delete('template/{id}', [TemplatesController::class, 'delete']);


    //Perencanaan
    Route::get('/perencanaan', [PerencanaanController::class, 'index']);
    Route::get('/perencanaan/{id}', [PerencanaanController::class, 'edit']);

    // Monev
    Route::get('/evaluasi', [ReportController::class, 'admin_view']);
    Route::get('/evaluasi/{id}', [ReportController::class, 'admin_update']);
    // Route::get('/pengumuman', function () {return view('admin.tambahpengumuman');});
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

//notification

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
