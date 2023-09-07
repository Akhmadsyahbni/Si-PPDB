<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\FormulirController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KeluargaController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\PpdbController;
use App\Http\Controllers\Admin\ReportController;
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
Route::get('/', 'App\Http\Controllers\LandingController@index')->name('index');
Route::get('/countdown', 'App\Http\Controllers\LandingController@countdown')->name('countdown');


// Route::get('/', 'App\Http\Controllers\LandingController@landing')->name('landing');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
          Route::post('/check',[UserController::class,'check'])->name('check');
          Route::get('/verify',[UserController::class,'verify'])->name('verify');
          Route::get('/password/forget',[UserController::class,'Forgetform'])->name('forget.password.form');
          Route::post('/password/forget',[UserController::class,'Sendlink'])->name('forget.password.link');
          Route::get('/password/reset/{token}',[UserController::class,'Resetform'])->name('reset.password.form');
          Route::post('/password/reset',[UserController::class,'Resetpassword'])->name('reset.password');
    });

    Route::middleware(['auth:web','is_user_verify_email','PreventBackHistory'])->group(function(){
        //   Route::get('/home',[FormulirController::class, 'index'])->name('formulir.index');
          Route::get('/home',[HomeController::class, 'index'])->name('home.index');
          Route::resource('formulir', FormulirController::class);
          Route::get('home/siswa/{id}/cetakformulir', [FormulirController::class,'cetakformulir'])->name('formulir.cetak');
          Route::get('home/siswa/profile', [FormulirController::class,'profile'])->name('siswa.profile');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home',[DashboardController::class, 'index'])->name('home.index');
        Route::post('reports', [DashboardController::class, 'generateReport'])->name('reports.generate');
        Route::resource('siswa', SiswaController::class);
        // Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
        Route::post('reports', [DashboardController::class, 'generateReport'])->name('reports.generate');
        Route::get('siswa/{id}/verify/{status}',[SiswaController::class,'verifyStatus'] )->name('verifyStatus');
        Route::get('siswa/export/pdf', [SiswaController::class, 'exportPDF'])->name('siswa.export.pdf');
        Route::get('siswa/export/excel', [SiswaController::class, 'exportExcel'])->name('siswa.export.excel');
        Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
        Route::get('sekolah/{id}/edit_sekolah', [SekolahController::class, 'edit'])->name('sekolah.edit_sekolah');
        Route::get('keluarga/{id}/edit_keluarga', [KeluargaController::class, 'edit'])->name('keluarga.edit_keluarga');
        Route::resource('keluarga', keluargaController::class);
        Route::get('/home/ppdb-settings', [PpdbController::class, 'index'])->name('ppdb-settings.index');
        Route::put('/home/ppdb-settings', [PpdbController::class, 'update'])->name('ppdb-settings.update');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

