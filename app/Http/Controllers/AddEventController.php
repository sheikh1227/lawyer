<?php

namespace App\Http\Controllers;
use App\Models\AddEvent;

use Illuminate\Http\Request;

class AddEventController extends Controller
{
    //
    public function addEvent(Request $request)
    {
        # code...
        // dd($request);

       
        // dd($settings);
        // dd(json_encode($request->all()));
        // SiteSettings::create($request);
        AddEvent::create([
            'title'=>$request->title,
            'business'=>$request->business,
            'start_date'=>$request->startdate,
            'end_date'=>$request->enddate,
            'all_day'=>$request->allday,
            'url'=>$request->url,
            'guest'=>$request->guest,
            'location'=>$request->location,
            'description'=>$request->description,
           ]);

        return redirect()->back();
        // dd();
    }
}
