<?php

use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserExportController;

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

Route::get('/', [CertificateController::class, 'dashboard'])->name('index');
Route::resource('certificate', CertificateController::class);
Route::post('/certificate/import', [CertificateController::class, 'import']);

Route::get('/export', [UserExportController::class, 'export']);
