<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

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


Route::group(['middleware' => 'prevent-back-history'], function () { // Prevent Back Host History


    Route::get('/', function () {
        return redirect(RouteServiceProvider::LOGIN);
    });

    Route::group(['prefix' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
        // Dashboard·······
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // Profile·······
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        //Roles·······
        Route::controller(RoleController::class)->group(function () {
            Route::get('role/index', 'index')->name('role.index');
            Route::get('role/show/{id}', 'show')->name('role.show');
            Route::post('role/save/permissions/{id}', 'savePermission')->name('role.save.permissions');
        });

        //Users·······
        Route::controller(UserController::class)->group(function () {
            Route::get('users/index', 'index')->name('user.index');
            Route::get('users/data', 'getUsers')->name('users.data');
        });


    });
    require __DIR__ . '/auth.php';

});

// service container : manage class dependencies
