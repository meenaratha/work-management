<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\AdminAuthController;

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
    return view('welcome');
});

// Example usage in routes/web.php

Route::get('/employee/register', [EmployeeAuthController::class, 'showregister'])->name('employee.register');
Route::post('/employee/handleregister', [EmployeeAuthController::class, 'register'])->name('employee.handleregister');

Route::group(['middleware' => 'auth:webemployee'],function(){
    Route::group(['middleware' => 'prevent-back-history'],function(){

        Route::get('/employee/dashboard', [EmployeeAuthController::class, 'dashboard'])->name('employee.dashboard');
    });

});

// Route::middleware(['browsehistory'])->group(function () {
//     Route::get('/employee/dashboard', [EmployeeAuthController::class, 'dashboard'])->name('employee.dashboard')->middleware("auth:webemployee");
//  });
// Route::get('/employee/dashboard', [EmployeeAuthController::class, 'dashboard'])->name('employee.dashboard')->middleware("auth:webemployee");
Route::get('/employee/login', [EmployeeAuthController::class, 'showloginform'])->name('employee.login');
Route::post('/employee/handle', [EmployeeAuthController::class, 'handlelogin'])->name('employee.handlelogin');
Route::get('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');
Route::post('/employee/logout', [EmployeeAuthController::class, 'handlelogout'])->name('employee.handlelogout');
Route::get('/employee/forgot-password', [EmployeeAuthController::class, 'showForgotPasswordForm'])->name('employee.forgot-password');
Route::post('/employee/forgot-password', [EmployeeAuthController::class, 'submitForgotPasswordForm'])->name('employee.forgot-password.email-verified');
Route::get('/employee/reset-password/{token}', [EmployeeAuthController::class, 'showRestPassword'])->name('employee.reset-password');
Route::post('/employee/reset-password', [EmployeeAuthController::class, 'submitresetPasswordForm'])->name('employee.password-reseted');


Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:webadmin');
Route::get('/admin/login', [AdminAuthController::class, 'showloginform'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'handlelogin'])->name('admin.handlelogin');
Route::get('/admin/logout', [AdminAuthController::class, 'showlogout'])->name('admin.logout');
Route::post('/admin/logout', [AdminAuthController::class, 'handlelogout'])->name('admin.handlelogout');
