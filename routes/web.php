<?php

use App\Http\Controllers\Admin\DataJemaatController;
use App\Http\Controllers\Admin\PendataanBaptisController;
use App\Http\Controllers\Admin\PendataanMenikahController;
use App\Http\Controllers\Admin\PendataanSidiController;
use App\Http\Controllers\Jemaat\ProfilController;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\VirtualReality;
use GuzzleHttp\Middleware;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('sign-in');
    });
    
    Route::get('/', Login::class)->middleware('guest')->name('login');
    
    // Route::get('sign-up', Register::class)->middleware('guest')->name('register');
    // Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
    // Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');
});


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/data-jemaat', [DataJemaatController::class, 'index'])->name('data-jemaat');
        Route::get('/data-jemaat/create', [DataJemaatController::class, 'create'])->name('data-jemaat-create');
        Route::post('/data-jemaat', [DataJemaatController::class, 'store']);
        Route::get('/data-jemaat/{id}', [DataJemaatController::class, 'show'])->name('data-jemaat-show');
        Route::get('/data-jemaat/{id}/edit', [DataJemaatController::class, 'edit'])->name('data-jemaat-edit');
        Route::put('/data-jemaat/{id}', [DataJemaatController::class, 'update']);
        Route::delete('/data-jemaat/{id}', [DataJemaatController::class, 'destroy']);

        Route::get('/pendataan-baptis', [PendataanBaptisController::class, 'index'])->name('pendataan-baptis');

        Route::get('/pendataan-sidi', [PendataanSidiController::class, 'index'])->name('pendataan-sidi');
        
        Route::get('/pendataan-menikah', [PendataanMenikahController::class, 'index'])->name('pendataan-menikah');

        Route::get('billing', Billing::class)->name('billing');
        Route::get('profile', Profile::class)->name('profile');
        Route::get('tables', Tables::class)->name('tables');
        Route::get('notifications', Notifications::class)->name("notifications");
        Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
        Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
        Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
        Route::get('rtl', RTL::class)->name('rtl');

        Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
        Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');
    });

    Route::group(['middleware' => 'role:Jemaat'], function () {
        Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    });
});
