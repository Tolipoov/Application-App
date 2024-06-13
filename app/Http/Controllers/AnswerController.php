<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class AnswerController extends Controller
{
    public function create(Application $application)
    {

        if (! Gate::allows('answer-application', auth()->user())) {
            abort(403);
        }

        return view('answer.create', ['application'=>$application]);
    }

    public function store(Application $application, Request $request)
    {

        $request->validate(['body'=>'required']);

        $application->answer()->create([
            'body' => $request->body,
        ]);


        return redirect()->route('dashboard');
    }
}
