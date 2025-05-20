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
Route::get("categray",[adminController::class,'categray']);
Route::get("logout",[adminController::class,'logout']);
Route::post("add_category",[adminController::class,'add_category']);
Route::get("delete_category/{id}",[adminController::class,'delete_category']);
Route::get("add-quiz",[adminController::class,'add_quiz']);
Route::post("add-qus",[adminController::class,'add_qus']);