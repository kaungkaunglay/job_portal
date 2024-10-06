<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'account'], function(){
    //Guest Group
    Route::group(['middleware'=> 'guest'], function(){
        Route::post('/process-register',[AccountController::class,'process_registration'])->name('account.processionRegistration');
        Route::post('/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
        Route::get('/login',[AccountController::class,'login'])->name('account.Login');
        Route::get('/register',[AccountController::class,'registration'])->name('account.registration');
    });
    //Authenticated Group
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('/logout',action: [AccountController::class, 'logout'])->name('account.logout');
        Route::put('/update_profile',[AccountController::class,'updateProfile'])->name('account.update');
        Route::post('/update_password',[AccountController::class,'updatePassword'])->name('account.update_password');
        Route::post('/update_profile_picture',[AccountController::class,'updateProfileImage'])->name('account.update_profile_picture');
        Route::get('/create-job',[AccountController::class,'createJob'])->name('account.creation');
        Route::post('/save-job',[AccountController::class, 'saveJob'])->name('account.saveJob');
        Route::get('/my-jobs',[AccountController::class, 'myJobs'])->name('account.myJobs');
        Route::get('/my-jobs/edit/{job_id}', [AccountController::class,'EditJob'])->name('account.EditJob');
        Route::post('/update_jobs/{job_id}', [AccountController::class,'updateJob'])->name('account.updateJob');
        Route::post('/delete_jobs', [AccountController::class,'deleteJob'])->name('account.deleteJob');
    });
});

