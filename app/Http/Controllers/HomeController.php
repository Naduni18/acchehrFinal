<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Uuid;



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
        $id = auth()->id();
        $calender_events = DB::table('calender_events')->where('assigned_by', '=', $id)->get();//assigned by user

        $calender_events2 = DB::table('calender_events')->where('assigned_to', 'like', '%'.$id.'%' )->where('assigned_by', '!=', $id)->get();//assigned to user

        $calender_events3 = DB::table('calender_events')->where('assigned_to', '=', null )->where('assigned_by', '!=', $id)->get();// not assigned to anyone

        $ce = $calender_events->toJson();
        $ce2 = $calender_events2->toJson();
        $ce3 = $calender_events3->toJson();

        $assignees_array = DB::table('users')->select('id','name')->where('id', '!=', $id)->get();
 
       return view('dashboard',  compact('ce','ce2','ce3','assignees_array'));
      
       
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
       $uuid = null;
       $days_Of_Week_array=null;

        
        $array = (array)$request->assignest;
        if(count($array)!=0){
            $assigned_to='';
        foreach($request->assignesto as $key){

            $assigned_to=strval($key).','.$assigned_to;

        }
    }else{
        $assigned_to=null;
    }
        if($request->daysOfWeek!= null){
            $days_Of_Week='';
        foreach($request->daysOfWeek as $key){

            $days_Of_Week=strval($key).','.$days_Of_Week;

        }
        $days_Of_Week_array='['.$days_Of_Week.']';
    }
        if($request->startRecur!=null){
            $uuid = Uuid::generate()->string;
        }
    
//to do --------------add if else to prevent duplicate entry
        DB::table('calender_events')->insertOrIgnore([
            [
                'title' => $request->title,
                'description' =>$request->description,
                'start' =>$request->start,
                'end'=>$request->end,
                'startTime' =>$request->startTime,
                'endTime'=>$request->endTime,
                'startRecur' =>$request->startRecur,
                'endRecur'=>$request->endRecur,
                'daysOfWeek'=>$days_Of_Week_array,
                'groupId'=>$uuid,
                'assigned_by'=>$id,
                'assigned_to'=>$assigned_to,
                'location'=>$request->location,
                'notes'=>$request->notes,
                'created_at'=>now(),
            ],
        ]);

        return redirect()->to('/home'); 
    }

    /**
     * Store new events.
     *
     * @return \Illuminate\View\View
     * @param  \App\Http\Request   $request
     */
    public function delete(Request $request)
    {
        $event_Id = $request->eventId;

        DB::table('calender_events')->where('id', '=', $event_Id)->delete();

        return redirect()->to('/home'); 
        
    }
 
}
