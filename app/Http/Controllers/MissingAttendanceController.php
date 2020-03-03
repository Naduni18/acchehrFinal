<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MissingAttendanceController extends Controller
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
        $calender_events = DB::table('missing_attendance')->where([
            ['request_by', '=', $id],
        ])->get();  
        $ce = $calender_events->toJson();

        $to_approve = DB::table('missing_attendance')->where([
            ['manger_to_approve', '=', $id],
        ])->get();
  
       return view('attendance.entry',  compact('ce','to_approve'));
      
       
    }
    public static function get_manager($manager_id)
    {
        $manager=DB::table('users')->select('name')->where([['id', '=', $manager_id],])->get();
        
        return $manager;
    }

    public static function reject($attid)
    {
        DB::table('missing_attendance')
        ->where('id', '=',  $attid)
        ->update(['status' =>'rejected']); 

        $id = auth()->id();
        $calender_events = DB::table('missing_attendance')->where([
            ['request_by', '=', $id],
        ])->get();  
        $ce = $calender_events->toJson();

        $to_approve = DB::table('missing_attendance')->where([
            ['manger_to_approve', '=', $id],
        ])->get();
  
       return view('attendance.entry',  compact('ce','to_approve'));
        
    }
    public static function approve($attid)
    {
        DB::table('missing_attendance')
            ->where('id', '=',  $attid)
            ->update(['status' => 'approved']);

            $id = auth()->id();
            $calender_events = DB::table('missing_attendance')->where([
                ['request_by', '=', $id],
            ])->get();  
            $ce = $calender_events->toJson();
    
            $to_approve = DB::table('missing_attendance')->where([
                ['manger_to_approve', '=', $id],
            ])->get();
      
           return view('attendance.entry',  compact('ce','to_approve'));
            
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
        $calender_events = DB::table('missing_attendance')->where([
            ['request_by', '=', $id],
        ])->get();

        $ce = $calender_events->toJson();

        DB::table('missing_attendance')->insert([
            [
                'reason' => $request->reason,
                'date'=>$request->date,
                'start' =>$request->start,
                'end'=>$request->end,
                'request_by'=>auth()->id(),
                'manger_to_approve'=>auth()->user()->supervisor_manager,
            ],
        ]);
        $to_approve = DB::table('missing_attendance')->where([
            ['manger_to_approve', '=', $id],
        ])->get();
       
       
        return view('attendance.entry',  compact('ce','to_approve'));
    }
}
