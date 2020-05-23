<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrainingScheduleSummarryController extends Controller
{
   
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\View\View
         */
        public function index()
        { 

        $id = auth()->id();
        $summary=array();
        $users=DB::table('users')->where('supervisor_manager', '=', $id)->get();

        array_push($summary,array("employee","# of total training sessions ","# of training sessions in current month"));
        foreach($users as $u){

        $now = Carbon::now();
        $uid=$u->id;
        $uname=$u->name;
        $training_done_count = DB::table('training_schedule')->where('assigned_to', 'like', '%'.$uid.'%' )->count(); 
        $training_done_count_this_month = DB::table('training_schedule')->where('assigned_to', 'like', '%'.$uid.'%' )->whereYear('start','=',$now)->whereMonth('start','=',$now)->count();
        array_push($summary,array($uname,$training_done_count,$training_done_count_this_month));

        }
        
        $sum= json_encode($summary);
           return view('training_schedule.progress',compact('sum'));        
        }

        
}
