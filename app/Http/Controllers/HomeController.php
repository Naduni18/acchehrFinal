<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
        $calender_events = DB::table('calender_events')->get();

        $ce = $calender_events->toJson();

        $assignees_array = DB::table('users')->select('id','name')->get();
        
       return view('dashboard',  compact('ce','assignees_array'));
      
       
    }
    /**
     * Store new events.
     *
     * @return \Illuminate\View\View
     * @param  \App\Http\Request   $request
     */
    public function store(Request $request)
    {
        
        $id = auth()->id();
       

        $assigned_to='';
        foreach($request->assignesto as $key){

            $assigned_to=strval($key).','.$assigned_to;

        }
//to do --------------add if else to prevent duplicate entry
        DB::table('calender_events')->insertOrIgnore([
            [
                'title' => $request->title,
                'description' =>$request->description,
                'start' =>$request->start,
                'end'=>$request->end,
                'assigned_by'=>$id,
                'assigned_to'=>$assigned_to,
                'location'=>$request->location,
                'notes'=>$request->notes
            ],
        ]);


        $assignees_array = DB::table('users')->select('id','name')->get();

        $calender_events = DB::table('calender_events')->get();

        $ce = $calender_events->toJson();

        return view('dashboard',  compact('ce','assignees_array'));
    }


}
