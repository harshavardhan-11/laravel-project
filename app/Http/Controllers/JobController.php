<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\AppliedJob;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['employer', 'tags'])->latest()->simplePaginate(3);
//        dd($jobs);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'tags' => ['nullable'],
        ]);

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job)
    {
        // authorize (On hold...)

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // authorize (On hold...)

        $job->delete();

        return redirect('/jobs');
    }

    public function apply(Job $job) {
        $existingApplication = AppliedJob::where('job_listing_id', $job->id)
        ->where('user_id', Auth::id())
        ->first();

        if ($existingApplication) {
            return redirect('/applied-jobs');
        } 
        // Create a new application
        AppliedJob::create([
            'job_listing_id' => $job->id,
            'user_id' => Auth::id(),
            'is_active' => true, 
            'remarks' => ''
        ]);

        return redirect('/applied-jobs');
    }
}
