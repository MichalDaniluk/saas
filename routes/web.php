<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Companies
    Route::get('companies', [CompanyController::class, 'full'])->name('companies.list');
    Route::get('companies/full', [CompanyController::class, 'full'])->name('companies.list');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::get('companies/permissions', [CompanyController::class, 'permissions'])->name('companies.permissions');
    Route::get('companies/partners', [CompanyController::class, 'partners'])->name('companies.partners');
    Route::get('companies/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::get('companies/partners.edit/{id}', [CompanyController::class, 'edit_partners'])->name('companies.partners.edit');

    Route::post('companies/create', [CompanyController::class, 'store']);
    Route::put('companies/{id}', [CompanyController::class, 'update'])->name('companies.edit');
    Route::put('companies/partners.edit/{id}', [CompanyController::class, 'update_partners'])->name('companies.partners.edit');
    Route::delete('companies/{id}', [CompanyController::class, 'destroy'])->name('companies.delete');


//Company users
    Route::get('companies/users/create/{id}', [CompanyController::class, 'createUser'])->name('companies.user.create');
    Route::get('companies/users/edit/{id}', [UserController::class, 'edit'])->name('companies.user.edit');
    Route::get('companies/users/{company}', [CompanyController::class, 'users'])->name('companies.users');

    Route::post('companies/users/create', [UserController::class, 'store'])->name('companies.user.create');
    Route::put('companies/users/edit/{id}', [UserController::class, 'update'])->name('companies.user.edit');
    Route::delete('companies/users/{id}', [CompanyController::class, 'user_destroy'])->name('companies.user.delete');


//Courses
    Route::get('courses', [CourseController::class, 'full'])->name('courses.list');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');

    Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.delete');
    Route::post('courses/create', [CourseController::class, 'store'])->name('courses.edit');
    Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.edit');

//Terms
    Route::get('terms/list/{id}', [TermController::class, 'full'])->name('terms.list');
    Route::get('getterms/list/{id}/{code}/{site}', [TermController::class, 'fulljson'])->name('terms.listjson');
    Route::get('getterms/html/{id}/{code}/{site}', [TermController::class, 'fullhtml'])->name('terms.listjtml');
    Route::get('terms/create/{id}', [TermController::class, 'create'])->name('terms.create');
    Route::get('terms/{id}/{course_id}', [TermController::class, 'edit'])->name('terms.edit');

    Route::post('terms/create/{id}', [TermController::class, 'store']);
    Route::put('terms/{id}', [TermController::class, 'update'])->name('terms.edit');
    Route::delete('terms/{id}', [TermController::class, 'destroy'])->name('terms.delete');

//Orders
    Route::get('orders/full', [OrderController::class, 'full'])->name('orders.full');
    Route::get('orders/last', [OrderController::class, 'last'])->name('orders.last');
    Route::get('orders/term', [OrderController::class, 'term'])->name('orders.term');
    Route::get('orders/7days', [OrderController::class, 'days7']);
    Route::get('orders/14days', [OrderController::class, 'days14']);
    Route::get('orders/hidden', [OrderController::class, 'days']);
    Route::get('orders/noterm', [OrderController::class, 'noterm']);
    Route::get('orders/check', [OrderController::class, 'days']);
    Route::get('orders/log', [OrderController::class, 'log']);
    Route::get('orders/{id}', [OrderController::class, 'edit'])->name('orders.edit');


    Route::put('orders/{id}', [OrderController::class, 'update']);


//Courses
    Route::get('courses/full', [CourseController::class, 'full'])->name('courses.full');
    Route::get('courses/{course}', [CourseController::class, 'edit'])->name('courses.edit');

//Instructors
    Route::get('instructors', [InstructorController::class, 'full'])->name('instructors.full');
    Route::get('instructors/create', [InstructorController::class, 'create'])->name('instructors.create');

    Route::post('instructors/{id}', [InstructorController::class, 'store']);
    Route::put('instructors/{id}', [InstructorController::class, 'update'])->name('instructors.edit');
    Route::delete('instructors/{id}', [InstructorController::class, 'destroy'])->name('instructors.delete');

//Places
    Route::get('places', [PlaceController::class, 'full'])->name('places.full');
    Route::get('places/create', [PlaceController::class, 'create'])->name('places.create');

    Route::post('places/{id}', [PlaceController::class, 'store']);
    Route::put('places/{id}', [PlaceController::class, 'update'])->name('places.edit');
    Route::delete('places/{id}', [PlaceController::class, 'destroy'])->name('places.delete');

});

Route::get('orders/form/{id}/{code?}/{site?}', [OrderController::class, 'form'])->name('orders.form');
Route::post('orders/create', [OrderController::class, 'store'])->name('orders.create');
