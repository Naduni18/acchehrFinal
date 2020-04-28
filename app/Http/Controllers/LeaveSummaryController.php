<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeaveSummaryController extends Controller
{
    /**
         * Show Leave summary for manager
         *
         * @return \Illuminate\View\View
         */
        public function index3()
        { 

        $id = auth()->id();
        $summary=array();
        $users=DB::table('users')->where([['supervisor_manager', '=', $id],])->get();

        array_push($summary,array(
         "employee",
         "# of total approved leaves in this year ","# of approved leaves in current month",
         "# of total approved no pay leaves in this year ","# of approved no pay leaves in current month",
         "# of total approved casual leaves in this year ","# of approved casual leaves in current month"
       ));
        foreach($users as $u){

        $now = Carbon::now();
        $uid=$u->id;
        $uname=$u->name;
        $leave_count_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_leave_count=$leave_count_full_day + $leave_count_half_day/2 +$leave_count_short_leave/4;
        $approved_leave_count_this_month=$leave_count_this_month_full_day+$leave_count_this_month_half_day/2+$leave_count_this_month_short_leave/4;
        
        $leave_count_no_pay_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_no_pay_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_no_pay_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_no_pay_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_no_pay_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_no_pay_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_no_pay_leave_count=$leave_count_no_pay_full_day + $leave_count_no_pay_half_day/2 +$leave_count_no_pay_short_leave/4;
        $approved_no_pay_leave_count_this_month=$leave_count_no_pay_this_month_full_day+$leave_count_no_pay_this_month_half_day/2+$leave_count_no_pay_this_month_short_leave/4;
        
        $leave_count_casual_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_casual_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_casual_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_casual_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_casual_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_casual_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_casual_leave_count=$leave_count_casual_full_day + $leave_count_casual_half_day/2 +$leave_count_casual_short_leave/4;
        $approved_casual_leave_count_this_month=$leave_count_casual_this_month_full_day+$leave_count_casual_this_month_half_day/2+$leave_count_casual_this_month_short_leave/4;
        
        
        array_push($summary,array(
         $uname,
         $approved_leave_count,$approved_leave_count_this_month,
         $approved_no_pay_leave_count,$approved_no_pay_leave_count_this_month,
         $approved_casual_leave_count,$approved_casual_leave_count_this_month
       ));

        }
        $sum= json_encode($summary);
        $sumA=$this->index5();
           return view('leave.progress',compact('sum','sumA'));        
        }
/**
         * Show Leave summary for admin
         *
         * @return \Illuminate\View\View
         */
        public function index4()
        { 

        $id = auth()->id();
        $summary=array();
        $users=DB::table('users')->get();

        array_push($summary,array(
           "employee",
           "# of total approved leaves in this year ","# of approved leaves in current month",
           "# of total approved no pay leaves in this year ","# of approved no pay leaves in current month",
           "# of total approved casual leaves in this year ","# of approved casual leaves in current month"
         ));
        foreach($users as $u){

        $now = Carbon::now();
        $uid=$u->id;
        $uname=$u->name;
        $leave_count_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_leave_count=$leave_count_full_day + $leave_count_half_day/2 +$leave_count_short_leave/4;
        $approved_leave_count_this_month=$leave_count_this_month_full_day+$leave_count_this_month_half_day/2+$leave_count_this_month_short_leave/4;
        
        $leave_count_no_pay_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_no_pay_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_no_pay_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_no_pay_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_no_pay_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','no pay')->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_no_pay_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','no pay')->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_no_pay_leave_count=$leave_count_no_pay_full_day + $leave_count_no_pay_half_day/2 +$leave_count_no_pay_short_leave/4;
        $approved_no_pay_leave_count_this_month=$leave_count_no_pay_this_month_full_day+$leave_count_no_pay_this_month_half_day/2+$leave_count_no_pay_this_month_short_leave/4;
        
        $leave_count_casual_full_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','full day')->count(); 
        $leave_count_casual_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','full day')->whereMonth('start','=',$now)->count();
        $leave_count_casual_half_day = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','half day')->count(); 
        $leave_count_casual_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','half day')->whereMonth('start','=',$now)->count();
        $leave_count_casual_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid )->where('type','=','casual')->where('status','=','approved')->where('category','=','short leave')->count(); 
        $leave_count_casual_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $uid  )->where('type','=','casual')->where('status','=','approved')->where('category','=','short leave')->whereMonth('start','=',$now)->count();
        $approved_casual_leave_count=$leave_count_casual_full_day + $leave_count_casual_half_day/2 +$leave_count_casual_short_leave/4;
        $approved_casual_leave_count_this_month=$leave_count_casual_this_month_full_day+$leave_count_casual_this_month_half_day/2+$leave_count_casual_this_month_short_leave/4;
        
        array_push($summary,array(
           $uname,
           $approved_leave_count,$approved_leave_count_this_month,
           $approved_no_pay_leave_count,$approved_no_pay_leave_count_this_month,
           $approved_casual_leave_count,$approved_casual_leave_count_this_month
         ));

        }
        $sum= json_encode($summary);
        $sumA=$this->index5();
           return view('leave.progress',compact('sum','sumA'));        
        }

        /**
         * Show Leave summary for employee
         *
         * @return \Illuminate\View\View
         */
        public function index5()
        { 

        $id = auth()->id();
        $summary_approved=array();
$months=array(
   "01"=>"January", 
   "02"=>"February", 
   "03"=>"March",
   "04"=>"April",
   "05"=>"May",
   "06"=>"June", 
   "07"=>"July", 
   "08"=>"August",
   "09"=>"September",
   "10"=>"October",
   "11"=>"November",
   "12"=>"December",
);
$month_number=array('01','02','03','04','05','06','07','08','09','10','11','12');
        array_push($summary_approved,array("month","approved","pending","rejected","full day","half day","short leave","no pay","casual"));
        foreach($month_number as $m){

        $leave_count_this_month_approved = DB::table('leave_requests')->where('request_by', '=', $id  )->where('status','=','approved')->whereMonth('date_','=',$m)->count();
        $leave_count_this_month_rejected = DB::table('leave_requests')->where('request_by', '=', $id  )->where('status','=','rejected')->whereMonth('date_','=',$m)->count();
        $leave_count_this_month_pending = DB::table('leave_requests')->where('request_by', '=', $id  )->where('status','=','pending')->whereMonth('date_','=',$m)->count();
        
        $leave_count_this_month_full_day = DB::table('leave_requests')->where('request_by', '=', $id  )->where('category','=','full day')->whereMonth('date_','=',$m)->count();
        $leave_count_this_month_half_day = DB::table('leave_requests')->where('request_by', '=', $id  )->where('category','=','half day')->whereMonth('date_','=',$m)->count();
        $leave_count_this_month_short_leave = DB::table('leave_requests')->where('request_by', '=', $id  )->where('category','=','short leave')->whereMonth('date_','=',$m)->count();
        
        $leave_count_this_month_no_pay = DB::table('leave_requests')->where('request_by', '=', $id  )->where('type','=','no pay')->whereMonth('date_','=',$m)->count();
        $leave_count_this_month_casual = DB::table('leave_requests')->where('request_by', '=', $id  )->where('type','=','casual')->whereMonth('date_','=',$m)->count();

        array_push($summary_approved,array(
           $months[$m],
           $leave_count_this_month_approved,
           $leave_count_this_month_pending,
           $leave_count_this_month_rejected,
           $leave_count_this_month_full_day,
           $leave_count_this_month_half_day,
           $leave_count_this_month_short_leave,
           $leave_count_this_month_no_pay,
           $leave_count_this_month_casual
         ));

        }
        $sumA= json_encode($summary_approved);
           return $sumA;        
        }
}
