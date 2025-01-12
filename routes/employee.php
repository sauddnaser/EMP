<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function () {

    Route::get('/auth/logout', function () {
        Auth::guard('employee')->logout();
        return redirect(route('employee.auth.login'));

    })->name('employee.auth.logout');


    Route::namespace('App\Livewire')->group(function () {
        Route::group([
            'prefix' => 'auth',
            'middleware' => 'guest:manager',
        ], function () {

            Route::get('/login', Employee\Auth\Login::class)->name('employee.auth.login');

        });

        Route::group([
            'prefix' => '',
            'middleware' => 'auth:employee',
        ], function () {
            Route::get('/', Employee\Dashboard\Index::class)->name('employee.dashboard');
        });

        Route::group([
            'prefix' => 'programs',
            'middleware' => 'auth:employee',
        ], function () {
            Route::get('/', Employee\Program\Index::class)->name('employee.programs.index');
            Route::get('/tasks/{registration}', Employee\Program\Details\TaskList::class)->name('employee.programs.task');
        });

    });
});


