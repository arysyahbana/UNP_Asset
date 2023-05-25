<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\FrontLoginControler;
use App\Http\Controllers\Frontend\FrontPostController;
use App\Http\Controllers\Frontend\FrontPremiumController;
use App\Http\Controllers\Frontend\FrontSignUpController;
use App\Http\Controllers\Frontend\FrontProfileController;
use App\Http\Controllers\Frontend\LikeController;
use App\Models\User;

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

//admin dashboard
Route::get('admin/', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin:admin');
//end admin dashboard

//admin login
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin_login');
Route::post('admin/login/submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('admin/forget', [AdminLoginController::class, 'forget'])->name('admin_forget');
Route::post('admin/forget/submit', [AdminLoginController::class, 'forget_submit'])->name('admin_forget_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-submit', [AdminLoginController::class, 'reset_submit'])->name('admin_reset_submit');
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

//admin sub category (tidak dipakai)
// Route::get('admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_subCategory_show')->middleware('admin:admin');
// Route::get('admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_subCategory_create')->middleware('admin:admin');
// Route::post('admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_subCategory_store')->middleware('admin:admin');
// Route::get('admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_subCategory_edit')->middleware('admin:admin');
// Route::post('admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_subCategory_update')->middleware('admin:admin');
// Route::get('admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_subCategory_delete')->middleware('admin:admin');
//end admin sub category

//admin users
Route::get('admin/users/show', [AdminUserController::class, 'show'])->name('admin_user_show')->middleware('admin:admin');
Route::get('admin/users/create', [AdminUserController::class, 'create'])->name('admin_user_create')->middleware('admin:admin');
Route::post('admin/users/store', [AdminUserController::class, 'store'])->name('admin_user_store')->middleware('admin:admin');
Route::get('admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin_user_edit')->middleware('admin:admin');
Route::post('admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin_user_update')->middleware('admin:admin');
Route::get('admin/users/delete/{id}', [AdminUserController::class, 'delete'])->name('admin_user_delete')->middleware('admin:admin');
//end admin users


// Frontend
Route::get('/', [FrontHomeController::class, 'index'])->name('home');
Route::get('/photo', [FrontHomeController::class, 'photo'])->name('photo');
Route::get('/photo/{ukuran}', [FrontHomeController::class, 'reso'])->name('reso');
Route::get('/video', [FrontHomeController::class, 'video'])->name('video');
Route::get('/audio', [FrontHomeController::class, 'audio'])->name('audio');
Route::get('/detail/{id}/{name}', [FrontHomeController::class, 'detail'])->name('detail');
Route::get('/download/{file}', [FrontHomeController::class, 'download'])->name('download')->middleware('auth');
Route::get('/link/{id}', [FrontHomeController::class, 'linkuser'])->name('linkuser')->middleware('auth');
// end Frontend

//front post
Route::get('posts/show/{id}/{name}', [FrontPostController::class, 'show'])->name('post_show')->middleware('auth');
Route::get('posts/create/{id}/{name}', [FrontPostController::class, 'create'])->name('post_create')->middleware('auth');
Route::post('posts/store', [FrontPostController::class, 'store'])->name('post_store')->middleware('auth');
Route::get('posts/delete/{id}', [FrontPostController::class, 'delete'])->name('post_delete')->middleware('auth');
Route::get('posts/view/{id}/{name}', [FrontPostController::class, 'view'])->name('post_view')->middleware('auth');
Route::get('posts/edit/{id}', [FrontPostController::class, 'edit'])->name('post_edit')->middleware('auth');
Route::post('posts/update/{id}', [FrontPostController::class, 'update'])->name('post_update')->middleware('auth');
//end front post

//front signup
Route::get('signup', [FrontSignUpController::class, 'signup'])->name('user_signup');
Route::post('signup_submit', [FrontSignUpController::class, 'store'])->name('signup_submit');
Route::get('signup/verification/{token}/{email}', [FrontSignUpController::class, 'verif'])->name('user_verif');
//end front signup

//front login
Route::post('user/login/submit', [FrontLoginControler::class, 'login_submit'])->name('user_login_submit');
Route::get('user/logout', [FrontLoginControler::class, 'logout'])->name('user_logout');
Route::get('user/forget', [FrontLoginControler::class, 'forget'])->name('user_forget');
Route::get('user/reset-password/{token}/{email}', [FrontLoginController::class, 'reset_password'])->name('user_reset_password');
Route::post('user/forget/submit', [FrontLoginControler::class, 'forget_submit'])->name('user_forget_submit');
Route::get('user/reset-password/{token}/{email}', [FrontLoginControler::class, 'reset_password'])->name('user_reset_password');
Route::post('user/reset-submit', [FrontLoginControler::class, 'reset_submit'])->name('user_reset_submit');
//end front login

//front profile
Route::get('profile/{id}', [FrontProfileController::class, 'edit'])->name('profile_edit')->middleware('auth');
Route::post('profile/update/{id}', [FrontProfileController::class, 'update'])->name('profile_update')->middleware('auth');
//end front profile

//front like
Route::get('like/{id}', [LikeController::class, 'like'])->name('like')->middleware('auth');
//end front like

// akun premium
Route::get('/user/show-premium/{id}', [FrontPremiumController::class, 'show_premium'])->name('show_premium')->middleware('auth');
Route::get('/user/show-bayar/{id}', [FrontPremiumController::class, 'show_bayar'])->name('show_bayar')->middleware('auth');
Route::post('/user/premium/{id}', [FrontPremiumController::class, 'premium'])->name('update_premium')->middleware('auth');
Route::get('/user/premium/hp', [FrontPremiumController::class, 'noHp'])->name('noHp')->middleware('auth');
// end akun premium
