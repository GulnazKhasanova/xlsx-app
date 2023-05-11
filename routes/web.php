<?php

use App\Http\Controllers\AddExcelDoc;
use App\Http\Controllers\ZakazUnityController;
use Illuminate\Support\Facades\Route;
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

Route::group(['namespace' => 'app\Http\Controllers'], function () {
    Route::get('/', [AddExcelDoc::class, 'index'])-> name('index');
    Route::post('/zakazunity/import', [ZakazUnityController::class, 'import']);

});
