<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/revisi', function () {
    return view('revisi');
});

//report
Route::get('/report', [ReportController::class, 'report']);
Route::post('/report/upload', [ReportController::class, 'report_upload']);

Route::get('view', [App\Http\Controllers\FileController::class, 'getFile']);
Route::get('get/{filename}', [FileController::class, 'getfile']);


Route::middleware('role:admin')->get('/admin', function(){
    return view('admin.home');
})->name('admin');
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/admin', function () {return view('admin.home');})->name('admin');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/perencanaan', function () {return view('admin.perencanaan');});
    Route::get('/evaluasi', function () {return view('admin.evaluasi');});
    Route::get('/template', function () {return view('admin.datatemplate');});
    Route::get('/pengumuman', function () {return view('admin.tambahpengumuman');});
});

Route::get('/sidebar', function () {
    return view('sidebar');
});
