<?php

use Illuminate\Support\Facades\Route;
use App\Datainfo;
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
    $data = Datainfo::all();
    return view('home', ["data" => $data]);
})->name("home");
Route::POST('/adddata', 'datacontroller@adddata')->name('adddata');

Route::GET('/printpdf', 'datacontroller@printpdf')->name('printpdf');
