<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// ...

Route::get('/searchForm', [StudentController::class, 'showSearchForm']);

Route::get('/searchForm/search', [StudentController::class, 'search']);

Route::get('/studentList', function () {
    // Assuming you want to display all students initially
    $students = \App\Models\Student::all();
    return view('studentList', ['students' => $students]);
});

Route::get('/students', function(){
    return view('students');
});

Route::get('/students/{student}', [StudentController::class, 'show']);

// ...
Route::get('/temp', function(){
    return view('temp');
});

Route::get('/accounts', function () {
    // Assuming you want to display all students initially
    $accounts = \App\Models\Account::all();
    return view('accounts', ['accounts' => $accounts]);
});

Route::get('/accounts/{account}', [TransactionController::class, 'showTransactions']);

Route::get('/transaction', function(){
    return view('transaction');
});

Route::post('/transaction/create', [TransactionController::class, 'create']);