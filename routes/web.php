<?php

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

Route::get('/', function () {
    return view('Front.index');
});
Route::view('home','Front.index')->name('home');
Route::view('about','Front.about')->name('about');
Route::view('contact','Front.contact')->name('contact');
Route::view('projects','Front.project')->name('projects');
Route::view('services','Front.service')->name('services');
Route::view('teams','Front.team')->name('teams');


//Route::prefix('cms/admin')->middleware(['auth:admin','has.permission'])->group(function (){
//    Route::view('/','cms.dashboard')->name('dashboard');
//    Route::view('upload','cms.product.upload');
//    Route::resource('products', ProductController::class);
//    Route::resource('admins',AdminController::class);
//    Route::resource('roles',RoleController::class);
//    Route::resource('permissions',PermissionController::class);
//    Route::resource('posts',PostController::class);
//    Route::resource('sections',SectionController::class);
//    Route::resource('sponsors',SponsorController::class);
//    Route::get('get_roles', [AdminController::class, 'loadRoles'])->name('get_roles');
//    Route::get('slider/index',[SliderController::class,'index'])->name('slider.index');
//    Route::get('slider/create',[SliderController::class,'create'])->name('slider.create');
//    Route::post('slider',[SliderController::class,'store'])->name('slider.store');
//    Route::delete('slider/{id}',[SliderController::class,'destroy'])->name('slider.destroy');
//    Route::resource('users',UserController::class);
////        Route::get('orders',[CartController::class,'userOrder'])->name('industries_orders.index');
//    Route::get('mail',[MailController::class ,'create'])->name('mail.create');
//    Route::post('mail',[MailController::class,'store'])->name('mail.store');
//});
//
//Route::prefix('dashboard')->group(function (){
//    Route::post('/login',[AdminAuthController::class,'login'])->name('admin-login');
//    Route::get('/login',[AdminAuthController::class,'showLoginView'])->name('admin.login_view');
//});
//
//Route::prefix('dashboard')->middleware('auth:admin')->group(function (){
//    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin.logout')->middleware('auth:admin');
//
//});
