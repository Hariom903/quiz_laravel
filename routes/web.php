<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/admin-login','admin-login');

Route::post("admin-login",[adminController::class,'login']);
Route::get("dashboard",[adminController::class,'dashboard']);