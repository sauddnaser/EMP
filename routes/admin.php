<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/auth/logout', function () {
        Auth::guard('web')->logout();
        return redirect(route('admin.auth.login'));

    })->name('admin.auth.logout');


    Route::namespace('App\Livewire')->group(function () {
        Route::group([
            'prefix' => 'auth',
            'middleware' => 'guest:web',
        ], function () {

            Route::get('/login', Admin\Auth\Login::class)->name('admin.auth.login');

        });

        Route::group([
            'prefix' => '',
            'middleware' => 'auth:web',

        ], function () {
            Route::get('/', Admin\Dashboard\Index::class)->name('admin.dashboard');
        });

        Route::group([
            'prefix' => 'departments',
            'middleware' => 'auth:web',

        ], function () {
            Route::get('/', Admin\Department\Index::class)->name('admin.department');
        });

        Route::group([
            'prefix' => 'managers',
            'middleware' => 'auth:web',

        ], function () {
            Route::get('/', Admin\Manager\Index::class)->name('admin.manager');
            Route::get('{manager}/', Admin\Manager\Details\Index::class)->name('admin.manager.details');
        });

        Route::group([
            'prefix' => 'programs',
            'middleware' => 'auth:web',

        ], function () {
            Route::get('/', Admin\Program\Index::class)->name('admin.program');
        });

        Route::group([
            'prefix' => 'employees',
            'middleware' => 'auth:web',

        ], function () {
            Route::get('/', Admin\Employee\Index::class)->name('admin.employee');
            Route::get('{employee}/', Admin\Employee\Details\Index::class)->name('admin.employee.details');
            Route::get('{employee}/setting', Admin\Employee\Details\Setting::class)->name('admin.employee.setting');
            Route::get('{employee}/programs', Admin\Employee\Details\Programs::class)->name('admin.employee.program');
        });
    });
});


