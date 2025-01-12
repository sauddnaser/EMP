<?php


use Illuminate\Support\Facades\Route;

Route::prefix('manager')->group(function () {

    Route::get('/auth/logout', function () {
        Auth::guard('manager')->logout();
        return redirect(route('manager.auth.login'));

    })->name('manager.auth.logout');


    Route::namespace('App\Livewire')->group(function () {
        Route::group([
            'prefix' => 'auth',
            'middleware' => 'guest:manager',
        ], function () {

            Route::get('/login', Manager\Auth\Login::class)->name('manager.auth.login');

        });

        Route::group([
            'prefix' => '',
            'middleware' => 'auth:manager',
        ], function () {
            Route::get('/', Manager\Dashboard\Index::class)->name('manager.dashboard');
        });

        Route::group([
            'prefix' => 'employees',
            'middleware' => 'auth:manager',
        ], function () {
            Route::get('/', Manager\Employee\Index::class)->name('manager.employee');
            Route::get('{employee}', Manager\Employee\Details\Index::class)->name('manager.employee.details');
            Route::get('{employee}/programs', Manager\Employee\Details\Program::class)->name('manager.employee.programs');
            Route::get('{registration}/tasks', Manager\Employee\Details\TaskList::class)->name('manager.employee.tasks');
        });

        Route::group([
            'prefix' => 'programs',
            'middleware' => 'auth:manager',
        ], function () {
            Route::get('/', Manager\Program\Index::class)->name('manager.program');
            Route::get('{program_id}/employees', Manager\Program\Details\Employee::class)->name('manager.program.employee');
        });

    });
});


