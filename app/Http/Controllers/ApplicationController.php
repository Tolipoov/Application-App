<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request){

        // dd($request->all());

        $path = null;
        $name = null;

        if($request->hasFile('file_url')){
            $name = $request->file('file_url')->getClientOriginalName();
            $path = $request->file('file_url')->storeAs('files', $name, 'public');
        }

        //dd($path, $name, $request->all());

    
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'file' => 'file|mimes:jpg,png,pdf'
        ]);

        
        $application = Application::create([
            'user_id'=> auth()->user()->id,
            "subject" => $request->subject,
            "message" => $request->message,
            "file_url" => $path ?? null,
        ]);

        return redirect()->back();
    }
}
