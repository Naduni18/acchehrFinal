<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MissingAttendanceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = auth()->id();
        $attendance_requests = DB::table('missing_attendance')->where('request_by', '=', $id)->get();  
        $to_approve = DB::table('missing_attendance')->where('manger_to_approve', '=', $id)->get();
  
        return view('attendance.view',  compact('attendance_requests','to_approve'));
      
       
    }
    public static function get_user_name($user_id)
    {
        $user_=DB::table('users')->select('name')->where([['id', '=', $user_id],])->first();
        
        return $user_;
    }

    public static function reject(Request $request)
    {
        $attid=$request->requestId;
        DB::table('missing_attendance')->where('id', '=',  $attid)->update(['status' =>'rejected']); 

        return redirect()->to('/attendance'); 
      
        
    }
    public static function approve(Request $request)
    {
        $attid=$request->requestId;
        DB::table('missing_attendance')->where('id', '=',  $attid)->update(['status' => 'approved']);

        return redirect()->to('/attendance');    
    }

    /**
     * Store new events.
     *
     * @return \Illuminate\View\View
     * @param  \App\Http\Request   $request
     */
    public function store(Request $request)
    {
        if($request->att_id_=="add"){
        
        $id = auth()->id();
        

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
        }else{
            DB::table('missing_attendance')->where('id', '=', $request->att_id_)->update(
                array(
                'reason' => $request->reason,
                'date'=>$request->date,
                'start' =>$request->start,
                'end'=>$request->end,
                'request_by'=>auth()->id(),
                'manger_to_approve'=>auth()->user()->supervisor_manager,
                )
            );
    

        }
       
        return redirect()->to('/attendance'); 
    }
    public static function destroy(Request $request)
    {
        $attid=$request->requestId;
        DB::table('missing_attendance')->where('id', '=',  $attid)->delete();
        return redirect()->to('/attendance'); 
    }
    

    public function index2(Request $request)
    {
        
        $attid=$request->requestId;
        
        if($attid=="add"){
            $attendance_req =null;
            return view('attendance.add_edit',compact('attid','attendance_req'));
            
        }else{
            $attendance_req = DB::table('missing_attendance')->where('id', '=', $attid)->first(); 
           
            return view('attendance.add_edit',compact('attid','attendance_req'));
        }
       
        
      
       
    }

}
