<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index', ['jobs' => \App\Models\Job::all()->take(3)]);
})->name('index');

Route::get('/jobs', [JobController::class, 'index'])->name('index.jobs');
Route::get('/find', [JobController::class, 'find'])->name('jobs.find');
Route::get('/jobs/{id}', [JobController::class, 'job_details'])->name('jobs.details');


Route::middleware('auth')->group(function () {
    Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/store', [JobController::class, 'store'])->name('jobs.store');
});


Auth::routes();


