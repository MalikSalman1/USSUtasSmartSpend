<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\HomeController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Master\UserequestController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Staff\StaffHomeController as StaffHomeController;
use App\Http\Controllers\Staff\StaffExpanseController as StaffExpanseController;
use App\Http\Controllers\Manager\ManagerHomeController as ManagerHomeController;
use App\Http\Controllers\Manager\ManagerExpanseController as ManagerExpanseController;
use App\Http\Controllers\Hod\HodHomeController as HodHomeController;
use App\Http\Controllers\Hod\HodExpanseController as HodExpanseController;
use App\Http\Controllers\Staff\StaffProfileController as StaffProfileController;
use App\Http\Controllers\Manager\ManagerProfileController as ManagerProfileController;
use App\Http\Controllers\Hod\HodProfileController as HodProfileController;
use App\Http\Controllers\Master\MasterProfileController as MasterProfileController;
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

Route::get('/signup', [Authcontroller::class, 'signup_page']);
Route::post('signup', [Authcontroller::class, 'signup'])->name('signup');
route::get('waiting', function () {
    return view('waitpage');
})->name('waiting');
// login
Route::get('/login', [Authcontroller::class, 'login_page']);
Route::post('/login', [Authcontroller::class, 'login'])->name('login');

// logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logged out successfully');
})->name('logout');

route::middleware(['auth'])->group(function () {

route::middleware(['role:master'])->group(function () {
    // master home routes
    route::get('/master/home', [HomeController::class, 'index'])->name('master.home');

    // master department routes
    route::get('/master/department', [DepartmentController::class, 'index'])->name('master.departments');
    route::post('/master/department', [DepartmentController::class, 'store'])->name('master.departments.store');
    route::get('/master/department/delete/{id}', [DepartmentController::class, 'delete'])->name('master.departments.delete');

    // master userrequests routes
    route::get('/master/userrequests', [UserequestController::class, 'index'])->name('master.userrequests');
    route::get('/master/userrequests/accept/{id}', [UserequestController::class, 'accept'])->name('master.userrequests.accept');
    route::get('/master/userrequests/reject/{id}', [UserequestController::class, 'reject'])->name('master.userrequests.reject');

    // master profile routes
    route::get('/master/profile', [MasterProfileController::class, 'index'])->name('master.profile');
    route::post('/master/profile', [MasterProfileController::class, 'update'])->name('master.profile.update');
});

route::middleware(['role:staff'])->group(function () {
    // staff home routes
    route::get('/staff/home', [StaffHomeController::class, 'index'])->name('staff.home');

    // staff expanses routes
    route::get('/staff/expanses', [StaffExpanseController::class, 'index'])->name('staff.expanses');
    route::post('/staff/expanses', [StaffExpanseController::class, 'store'])->name('staff.expanse.store');
    route::get('/staff/expanses/delete/{id}', [StaffExpanseController::class, 'delete'])->name('staff.expanse.delete');
    route::post('/staff/expanses/update', [StaffExpanseController::class, 'update'])->name('staff.expanse.update');
    route::get('/staff/expanses/download/{file}', [StaffExpanseController::class, 'download'])->name('staff.expanse.download');

    // staff profile routes
    route::get('/staff/profile', [StaffProfileController::class, 'index'])->name('staff.profile');
    route::post('/staff/profile', [StaffProfileController::class, 'update'])->name('staff.profile.update'); 
});

route::middleware(['role:manager'])->group(function () {
    // manager home routes
    route::get('/manager/home', [ManagerHomeController::class, 'index'])->name('manager.home');

    // manager expanses routes
    route::get('/manager/expanses', [ManagerExpanseController::class, 'index'])->name('manager.expanses');
    route::get('/manager/expanses/accept/{id}', [ManagerExpanseController::class, 'accept'])->name('manager.expanse.accept');
    route::post('/manager/expanses/reject', [ManagerExpanseController::class, 'reject'])->name('manager.expanse.reject');
    route::get('/manager/expanses/download/{file}', [ManagerExpanseController::class, 'download'])->name('manager.expanse.download');
    
    // manager profile routes
    route::get('/manager/profile', [ManagerProfileController::class, 'index'])->name('manager.profile');
    route::post('/manager/profile', [ManagerProfileController::class, 'update'])->name('manager.profile.update');
});

route::middleware(['role:hod'])->group(function () {
    // hod home routes
    route::get('/hod/home', [HodHomeController::class, 'index'])->name('hod.home');

    // hod expanses routes
    route::get('/hod/expanses', [HodExpanseController::class, 'index'])->name('hod.expanses');
    route::get('/hod/expanses/accept/{id}', [HodExpanseController::class, 'accept'])->name('hod.expanse.accept');
    route::post('/hod/expanses/reject', [HodExpanseController::class, 'reject'])->name('hod.expanse.reject');
    route::get('/hod/expanses/download/{file}', [HodExpanseController::class, 'download'])->name('hod.expanse.download');

    // hod profile routes
    route::get('/hod/profile', [HodProfileController::class, 'index'])->name('hod.profile');
    route::post('/hod/profile', [HodProfileController::class, 'update'])->name('hod.profile.update');
});
});