<?php

use App\Http\Controllers\EmployerJobController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::get('/employer/jobs', [EmployerJobController::class, 'index'])
        ->middleware(['auth'])
        ->name('employer_job_index');

Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])
    ->middleware(['auth'])
    ->name('employer_job_create');
