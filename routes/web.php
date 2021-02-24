<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\StudentController;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\TemplateProcessor;
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

Route::resource('students','App\Http\Controllers\StudentController');
//Route::get(url: 'students', action: "students")

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/students/word-export/{id}','App\Http\Controllers\StudentController@wordExport');
