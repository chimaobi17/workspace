<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::all(); // lazy loading
    // $jobs = Job::with('employer')->get(); // eager loading
    $jobs = Job::with('employer')->latest()->simplePaginate(3); 

    return view('jobs.index', [ // giving access to the job view
         'jobs' => $jobs
    ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job$job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]); 
    // dd(request()->all());
    // dd(request('title')); /for testing

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
    }

    public function edit(Job$job)
    {
        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job$job)
    {
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]); 
// authroize (on hold..)
    // update the job
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // redirect to the job index page
    return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job$job)
    {
        // authorize (on hold..)
    // delete the Job
    $job->delete();
    // redirect
    return redirect('/jobs');
    }
}
