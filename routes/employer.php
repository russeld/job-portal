<?php

use App\Http\Controllers\Employer\EmployerJobController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::get('/employer/jobs', [EmployerJobController::class, 'index'])
        ->middleware(['auth'])
        ->name('employer_job_index');

Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])
    ->middleware(['auth'])
    ->name('employer_job_create');

Route::post('/employer/jobs/create', [EmployerJobController::class, 'store'])
    ->middleware(['auth'])
    ->name('employer_job_store');

Route::get('/employer/jobs/{id}/edit', [EmployerJobController::class, 'edit'])
    ->middleware(['auth'])
    ->name('employer_job_edit');

Route::put('/employer/jobs/{id}/edit', [EmployerJobController::class, 'update'])
    ->middleware(['auth']);

Route::delete('/employer/jobs/{job}', [EmployerJobController::class, 'delete'])
    ->middleware(['auth'])
    ->name('employer_job_delete');

Route::get('/employer/jobs/{job}', [EmployerJobController::class, 'view'])
    ->middleware(['auth'])
    ->name('employer_job_view');
