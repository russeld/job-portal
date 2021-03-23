<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployerJobController extends Controller
{
    public function index()
    {
        return Inertia::render('Employer/Job/Index');
    }

    public function create()
    {
        $industries = Industry::all();
        $types = Job::JOB_TYPES;

        return Inertia::render(
            'Employer/Job/Create',
            [
                'industries' => $industries,
                'types' => $types
            ]
        );
    }
}
