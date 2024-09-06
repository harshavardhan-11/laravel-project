<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use Illuminate\Support\Facades\Auth;

class AppliedJobsController extends Controller
{
    public function index()
    {
        $appliedJobs = Auth::user()->appliedJobs()
            ->with(['job.employer', 'job.tags'])
            ->latest()
            ->simplePaginate(3);
        return view('jobs.applied-jobs', [
            'appliedJobs' => $appliedJobs
        ]);
    }

    public function show(AppliedJob $appliedJob) {
        $appliedJobDetails = $appliedJob->with(['job.employer', 'job.tags'])->first();
        return view('jobs.applied-job', [
            'appliedJob' => $appliedJobDetails
        ]);
    }

    public function delete(AppliedJob $appliedJob) {
        $appliedJob->delete();

        return redirect('/applied-jobs');
    }
}
