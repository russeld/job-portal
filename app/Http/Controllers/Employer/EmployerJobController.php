<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerJobRequest;
use App\Models\Industry;
use App\Models\Job;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class EmployerJobController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $company = Auth::user()->company()->firstOrFail();

        return Inertia::render(
            'Employer/Job/Index',
            [
                'jobs' => $company->jobs
            ]
        );
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        $types = Job::TYPES;
        $durations = Job::DURATIONS;
        $industries = Industry::select(['id', 'name'])->get();

        return Inertia::render(
            'Employer/Job/Create',
            [
                'types' => $types,
                'durations' => $durations,
                'industries' => $industries
            ]
        );
    }

    public function view()
    {
        return Inertia::render(
            'Employer/Job/View'
        );
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(EmployerJobRequest $request)
    {
        $company = Auth::user()->company()->firstOrFail();

        $job = new Job($request->input());
        $job->company()->associate($company);
        $job->save();

        return redirect()->route('employer_job_view', [$job]);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $company = Auth::user()->company()->firstOrFail();
        $job = $company->jobs()
            ->where('id', $id)
            ->select([
                'id',
                'title',
                'description',
                'industry_id',
                'opening',
                'type',
                'start_date',
                'duration',
                'min_salary',
                'max_salary',
                'status'
            ])
            ->firstOrFail();

        $types = Job::TYPES;
        $durations = Job::DURATIONS;
        $industries = Industry::select(['id', 'name'])->get();

        return Inertia::render(
            'Employer/Job/Edit',
            [
                'job'           => $job,
                'types'         => $types,
                'industries'    => $industries,
                'durations'     => $durations
            ]
        );
    }

    /**
     * @param EmployerJobRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EmployerJobRequest $request, int $id): RedirectResponse
    {
        $company = Auth::user()->company()->firstOrFail();
        $job = $company->jobs()->findOrFail($id);

        $job->update($request->input());
        return redirect()->back();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        $company = Auth::user()->company()->firstOrFail();
        $job = $company->jobs()->findOrFail($id);
        $job->delete();
        return redirect()->back();
    }
}
