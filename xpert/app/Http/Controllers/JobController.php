<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{ 
    $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

    return view('jobs.index', [
        'jobs' => $jobs[0],
        'featuredJobs' => $jobs[1], // or $jobs[true] if boolean
        'tags' => Tag::all(),
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'  ])],
            'url' => ['required', 'active_url'],
            'tags'=> ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
    foreach (explode(',', $attributes['tags']) as $tag){
        $tagName = trim($tag);                      // remove extra spaces
        Tag::firstOrCreate(['name' => $tagName]);   // create tag if it doesn't exist
        $job->tag($tagName);
    }
}
return redirect('/');

    }
}
