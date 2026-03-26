<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


class SearchController extends Controller
{
    public function __invoke()
    {
        // to search for jobs
        $jobs = Job::Query()
        ->with(['employer', 'tags'])
        ->where('title', 'LIKE', '%'.request('q').'%')
        ->get();

        return view('results', ['jobs' => $jobs]);
    }
}
