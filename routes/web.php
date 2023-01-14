<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserAccessMenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserSubMenuController;
use App\Models\UserAccessMenu;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // return view('dashboard');
    return view('mydashboard');
})->middleware(['auth', 'verified'])
    // ->name('dashboard');
    ->name('mydashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('book', BookController::class);

    Route::resource('user_role', UserRoleController::class);

    Route::resource('user_access_menu', UserAccessMenuController::class);
    // Route::get('user_access_menu/access/{id}', [UserAccessMenuController::class, 'access'])->name('user_access_menu.access');

    Route::resource('user_menu', UserMenuController::class);

    Route::resource('user_sub_menu', UserSubMenuController::class);

    Route::resource('user', UserController::class);
});


require __DIR__ . '/auth.php';
