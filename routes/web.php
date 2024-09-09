<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Front\Front\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Route::get('/', function () {
//    return view('Front.index');
//});


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::view('about','Front.about')->name('about');
    Route::view('contact','Front.contact')->name('contact');
    Route::view('projects','Front.project')->name('projects');
    Route::view('services','Front.service')->name('services');
    Route::view('teams','Front.team')->name('teams');

    Route::prefix('cms/admin')->middleware(['auth:admin','has.permission'])->group(function (){
    Route::view('/','cms.dashboard')->name('dashboard');
    Route::resource('admins',AdminController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('posts',PostController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('profile',ProfileController::class);
    Route::resource('projects',ProjectController::class);
    Route::resource('settings',SettingController::class);
    Route::resource('sliders',SliderController::class);


//    Route::resource('sponsors',SponsorController::class);

    Route::get('get_roles', [AdminController::class, 'loadRoles'])->name('get_roles');
    Route::put('update-settings',[SettingController::class,'updateSettings'])->name('update-settings');
    Route::get('edit-website-settings',[SettingController::class,'edit_settings'])->name('edit-website-settings');

//    Route::resource('users',UserController::class);
//        Route::get('orders',[CartController::class,'userOrder'])->name('industries_orders.index');
//    Route::get('mail',[MailController::class ,'create'])->name('mail.create');
//    Route::post('mail',[MailController::class,'store'])->name('mail.store');

});

Route::prefix('dashboard')->group(function (){
    Route::post('/login',[AdminAuthController::class,'login'])->name('admin-login');
    Route::get('/login',[AdminAuthController::class,'showLoginView'])->name('admin.login_view');
});

Route::prefix('dashboard')->middleware('auth:admin')->group(function (){
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin.logout')->middleware('auth:admin');

});
});
