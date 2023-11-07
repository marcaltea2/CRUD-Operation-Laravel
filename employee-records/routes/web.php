<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//index - show all data 
//show - show a single data
//create - show a form to add new user
//store - store a data
//edit - show form to edit a data
//update - update a data
//destroy - destroy a data


Route::controller(UserController::class)->group(function (){
    Route::get('/login', 'login')->name('login')->middleware(['guest', 'prevent-back-history']); // This route is used to get user login information
    Route::post('/login/process', 'process'); // This route is used to validate user login information
    Route::get('/register', 'register')->middleware(['guest', 'prevent-back-history']); // This route is used to get user registration information
    Route::post('/store', 'store'); // This route is used to validate and store to database the user registration information
    Route::post('/logout', 'logout'); // This route is used to logout user
});

Route::controller(EmployeeController::class)->group(function (){
    Route::get('/', 'index')->middleware(['auth', 'prevent-back-history']); // This route is the employees records page
    Route::get('/add/employee', 'create'); // This route is used to get new employee information
    Route::post('/add/employee', 'store'); // This route is used to store to database the new employee
    Route::get('/employee/{id}', 'show'); // This route is used to edit the employee information
    Route::put('/employee/{employee}', 'update'); // This route is used to validate and update the new information
    Route::delete('/employee/{employee}', 'destroy'); // This route is used to delete employee 
});



