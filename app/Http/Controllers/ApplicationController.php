<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function store(Request $request){


        if($this->checkDate()) {
            $path = null;
            $name = null;

            if($request->hasFile('file_url')){
                $name = $request->file('file_url')->getClientOriginalName();
                $path = $request->file('file_url')->storeAs('files', $name, 'public');
            }

            $request->validate([
                'subject' => 'required',
                'message' => 'required',
                'file' => 'file|mimes:jpg,png,pdf'
            ]);

            
            $application = Application::create([
                'user_id'=> auth()->user()->id,
                "subject" => $request->subject,
                "message" => $request->message,
                "file_url" => $path ,
            ]);

        
            dispatch(new SendEmailJob($application));

            return redirect()->back();    
        } else {
            return redirect()->back()->with('eror', 'You can create 1 application a day');
        }

        }
            
        protected function checkDate()
        {
            $result = true;
            $last_application = auth()->user()->applications()->latest()->first();
            if($last_application) {
                $last_app_date = Carbon::parse($last_application->created_at)->format('Y-m-d'); 
                $today = Carbon ::now()->format('Y-m-d');
                if($last_app_date == $today){
                    $result = false;
                }
            }

            return $result;
        }    
}
