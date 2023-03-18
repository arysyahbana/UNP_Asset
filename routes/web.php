<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\FrontPostController;
use App\Http\Controllers\FrontSignUpController;

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
    return view('frontend.home');
});
Route::get('/about', function () {
    return view('frontend.about');
});

//admin dashboard
Route::get('admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin:admin');
//end admin dashboard

//admin login
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin_login');
Route::post('admin/login/submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('admin/forget', [AdminLoginController::class, 'forget'])->name('admin_forget');
Route::get('admin/forget/submit', [AdminLoginController::class, 'forget_submit'])->name('admin_forget_submit');
//end admin login

//admin post
Route::get('admin/posts/show', [AdminPostController::class, 'show'])->name('admin_posts_show')->middleware('admin:admin');
//end admin post

//admin category
Route::get('admin/category/show', [AdminCategoryController::class, 'show'])->name('admin_category_show')->middleware('admin:admin');
Route::get('admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create')->middleware('admin:admin');
Route::post('admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store')->middleware('admin:admin');
Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update')->middleware('admin:admin');
Route::get('admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');
//end admin category

//admin sub category
Route::get('admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_subCategory_show')->middleware('admin:admin');
Route::get('admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_subCategory_create')->middleware('admin:admin');
Route::post('admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_subCategory_store')->middleware('admin:admin');
Route::get('admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_subCategory_edit')->middleware('admin:admin');
Route::post('admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_subCategory_update')->middleware('admin:admin');
Route::get('admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_subCategory_delete')->middleware('admin:admin');
//end admin sub category

//admin users
Route::get('admin/users/show', [AdminUserController::class, 'show'])->name('admin_user_show')->middleware('admin:admin');
Route::get('admin/users/create', [AdminUserController::class, 'create'])->name('admin_user_create')->middleware('admin:admin');
Route::post('admin/users/store', [AdminUserController::class, 'store'])->name('admin_user_store')->middleware('admin:admin');
Route::get('admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin_user_edit')->middleware('admin:admin');
Route::post('admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin_user_update')->middleware('admin:admin');
Route::get('admin/users/delete/{id}', [AdminUserController::class, 'delete'])->name('admin_user_delete')->middleware('admin:admin');
//end admin users

//front post
Route::get('posts/show', [FrontPostController::class, 'show'])->name('post_show');
Route::get('posts/create', [FrontPostController::class, 'create'])->name('post_create');
Route::post('posts/store', [FrontPostController::class, 'store'])->name('post_store');
//end front post

//front signup
Route::get('signup', [FrontSignUpController::class, 'signup'])->name('user_signup');
//end front signup
