<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $comps = User::all()->where('role_id', 2);
        $exps = Job::query()->select('experience')->distinct()->get()->sortBy('experience');
        $salaries = Job::query()->select('salary')->distinct()->get()->sortBy('salary');
        return view('jobs', ['jobs' => Job::all(), 'comps' => $comps, 'exps' => $exps, 'salaries' => $salaries]);
    }

    public function job_details(Request $r)
    {
        $job = Job::all()->where('id', $r->id)->first();
        return view('job_details', ['job' => $job]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'salary' => 'required',
            'schedule' => 'required',
            'experience' => 'required',
            'city' => 'required',
        ]);

        Job::create([
            'author_id' => Auth::user()->id,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'salary' => $validated['salary'],
            'company_name' => Auth::user()->name,
            'schedule' => $validated['schedule'],
            'experience' => $validated['experience'],
            'city' => $validated['city'],
            'category_id' => 1
        ]);
        return redirect('/jobs')->with("Successfully added");
    }

    public function find(Request $request)
    {
        $jobs = '';
        if(!empty($request->query('time'))
            && empty($request->query('company'))
            && empty($request->query('experience'))
            && empty($request->query('salary'))  ){
            $jobs = Job::query()->select()->where([
                ['schedule', '=', $request->query('time')],
            ])->get();
        }
        if(!empty($request->query('time'))
            && !empty($request->query('company'))
            && empty($request->query('experience'))
            && empty($request->query('salary'))  ){
            $jobs = Job::query()->select()->where([
                ['schedule', '=', $request->query('time')],
                ['author_id', '=', $request->query('company')],
            ])->get();
        }

        if(!empty($request->query('time'))
            && !empty($request->query('company'))
            && !empty($request->query('experience'))
            && empty($request->query('salary'))  ){
            $jobs = Job::query()->select()->where([
                ['schedule', '=', $request->query('time')],
                ['author_id', '=', $request->query('company')],
                ['experience', '=', $request->query('experience')],
            ])->get();
        }

        if(!empty($request->query('time'))
            && !empty($request->query('company'))
            && !empty($request->query('experience'))
            && !empty($request->query('salary'))  ){
            $jobs = Job::query()->select()->where([
                ['schedule', '=', $request->query('time')],
                ['author_id', '=', $request->query('company')],
                ['experience', '=', $request->query('experience')],
                ['salary', '=', $request->query('salary')],
            ])->get();
        }









        $comps = User::all()->where('role_id', 2);
        $exps = Job::query()->select('experience')->distinct()->get()->sortBy('experience');
        $salaries = Job::query()->select('salary')->distinct()->get()->sortBy('salary');

        return view('jobs', ['jobs' => $jobs, 'comps' => $comps, 'exps' => $exps, 'salaries' => $salaries]);
    }

}
