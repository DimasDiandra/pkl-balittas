<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\RevisiController;
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
Route::get('/markRead', function () {
    Auth::user()->unreadNotifications->markAsRead();

    return redirect()->back();
});

//Profile
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::put('/profile/{id}', [UserController::class, 'updateprofile']);

//Perencanaan
Route::get('/perencanaan', [PerencanaanController::class, 'perencanaan']);
Route::get('/perencanaan_status/{id}', [PerencanaanController::class, 'perencanaan_status']);
Route::post('/perencanaan/proses', [PerencanaanController::class, 'perencanaan_upload']);
Route::get('/perencanaan/download', [PerencanaanController::class, 'perencanaan_download']);

Route::get('/revisi', function () {
    return view('revisi');
});

//revisi
Route::get('/revisi', [RevisiController::class, 'revisi']);
Route::get('/revisi_status/{id}', [RevisiController::class, 'revisi_status']);
Route::post('/revisi/upload', [RevisiController::class, 'revisi_upload']);
Route::get('/revisi/download', [RevisiController::class, 'revisi_download']);


//report
Route::get('/report', [ReportController::class, 'report']);
Route::post('/report/upload', [ReportController::class, 'report_upload']);
Route::get('/report/download', [ReportController::class, 'report_download']);

Route::get('view', [App\Http\Controllers\FileController::class, 'getFile']);
Route::get('get/{filename}', [FileController::class, 'getfile']);

//Admin
Route::middleware('role:admin')->get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

    // List data User
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('admin/user/{id}', [App\Http\Controllers\UserController::class, 'delete']);
   
    //Profile
    Route::get('/profile/{id}', [UserController::class, 'profile_admin'])->name('profile_admin');
    Route::put('/profile/{id}', [UserController::class, 'updateprofile']);

    //Projek User
    Route::get('/projek', [App\Http\Controllers\ProjekController::class, 'show']);
    Route::post('/projek/buat', [App\Http\Controllers\ProjekController::class, 'create']);
    Route::get('/projek/{id}', [App\Http\Controllers\ProjekController::class, 'edit']);
    Route::put('/projek/{id}', [App\Http\Controllers\ProjekController::class, 'update']);
    Route::delete('admin/projek/{id}', [App\Http\Controllers\ProjekController::class, 'delete']);

    // Pengumuman Admin
    Route::get('/pengumuman', [PengumumanController::class, 'show']);
    Route::post('/pengumuman', [PengumumanController::class, 'store']);
    Route::get('/pengumuman/{id}', [PengumumanController::class, 'edit']);
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update']);
    Route::delete('admin/pengumuman/{id}', [PengumumanController::class, 'delete']);

    // Template Admin
    Route::get('template', [TemplatesController::class, 'show']);
    Route::post('template', [TemplatesController::class, 'store']);
    Route::delete('admin/template/{id}', [TemplatesController::class, 'delete']);


    //Perencanaan
    Route::get('/perencanaan', [PerencanaanController::class, 'index']);
    Route::get('/perencanaan/file', [PerencanaanController::class, 'semuafile']);
    Route::get('/perencanaan/{id}', [PerencanaanController::class, 'edit']);
    Route::get('/perencanaan/matriks/{id}', [PerencanaanController::class, 'viewmatriks']);
    Route::get('/perencanaan/rab/{id}', [PerencanaanController::class, 'viewrab']);
    Route::get('/perencanaan/kak/{id}', [PerencanaanController::class, 'viewkak']);
    Route::get('/perencanaan/analisis/{id}', [PerencanaanController::class, 'viewanalisis']);
    Route::get('/perencanaan/proposal/{id}', [PerencanaanController::class, 'viewproposal']);
    Route::put('/perencanaan/matriks/{id}', [PerencanaanController::class, 'statusmatriks']);
    Route::put('/perencanaan/rab/{id}', [PerencanaanController::class, 'statusrab']);
    Route::put('/perencanaan/kak/{id}', [PerencanaanController::class, 'statuskak']);
    Route::put('/perencanaan/analisis/{id}', [PerencanaanController::class, 'statusanalisis']);
    Route::put('/perencanaan/proposal/{id}', [PerencanaanController::class, 'statusproposal']);
    Route::delete('/perencanaan/matriks/{id}', [PerencanaanController::class, 'deletematriks']);
    Route::delete('/perencanaan/rab/{id}', [PerencanaanController::class, 'deleterab']);
    Route::delete('/perencanaan/kak/{id}', [PerencanaanController::class, 'deletekak']);
    Route::delete('/perencanaan/analisis/{id}', [PerencanaanController::class, 'deleteanalisis']);
    Route::delete('/perencanaan/proposal/{id}', [PerencanaanController::class, 'deleteproposal']);

    // Monev
    Route::get('/evaluasi', [ReportController::class, 'admin_view']);
    Route::get('/evaluasi/file', [ReportController::class, 'semuafile']);
    Route::get('/evaluasi/{id}', [ReportController::class, 'admin_update']);
    Route::get('/evaluasi/bulanan/{id}', [ReportController::class, 'viewbulanan']);
    Route::get('/evaluasi/triwulan/{id}', [ReportController::class, 'viewtriwulan']);
    Route::get('/evaluasi/tengah/{id}', [ReportController::class, 'viewtengah']);
    Route::get('/evaluasi/akhir/{id}', [ReportController::class, 'viewakhir']);
    Route::get('/evaluasi/destudi/{id}', [ReportController::class, 'viewdestudi']);
    Route::get('/evaluasi/renaksi/{id}', [ReportController::class, 'viewrenaksi']);
    Route::put('/evaluasi/bulanan/{id}', [ReportController::class, 'statusbulanan']);
    Route::put('/evaluasi/triwulan/{id}', [ReportController::class, 'statustriwulan']);
    Route::put('/evaluasi/tengah/{id}', [ReportController::class, 'statustengah']);
    Route::put('/evaluasi/akhir/{id}', [ReportController::class, 'statusakhir']);
    Route::put('/evaluasi/destudi/{id}', [ReportController::class, 'statusdestudi']);
    Route::put('/evaluasi/renaksi/{id}', [ReportController::class, 'statusrenaksi']);
    Route::delete('/evaluasi/bulanan/{id}', [ReportController::class, 'deletebulanan']);
    Route::delete('/evaluasi/triwulan/{id}', [ReportController::class, 'deletetriwulan']);
    Route::delete('/evaluasi/tengah/{id}', [ReportController::class, 'deletetengah']);
    Route::delete('/evaluasi/akhir/{id}', [ReportController::class, 'deleteakhir']);
    Route::delete('/evaluasi/renaksi/{id}', [ReportController::class, 'deleterenaksi']);
    Route::delete('/evaluasi/destudi/{id}', [ReportController::class, 'deletedestudi']);

    //Revisi Anggaran
    // Monev
    Route::get('/revisi', [RevisiController::class, 'admin_view']);
    Route::get('/revisi/file', [RevisiController::class, 'semuafile']);
    Route::get('/revisi/{id}', [RevisiController::class, 'admin_update']);
    Route::get('/revisi/semula_menjadi/{id}', [RevisiController::class, 'viewsemula_menjadi']);
    Route::get('/revisi/revisi_rab/{id}', [RevisiController::class, 'viewrevisi_rab']);
    Route::put('/revisi/semula_menjadi/{id}', [RevisiController::class, 'statussemula_menjadi']);
    Route::put('/revisi/revisi_rab/{id}', [RevisiController::class, 'statusrevisi_rab']);
    Route::delete('/revisi/semula_menjadi/{id}', [RevisiController::class, 'deletesemula_menjadi']);
    Route::delete('/revisi/revisi_rab/{id}', [RevisiController::class, 'deleterevisi_rab']);

    // Route::get('/pengumuman', function () {return view('admin.tambahpengumuman');});
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

//notification

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
