<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = auth()->id();
        $leave_requests = DB::table('leave_requests')->where('request_by', '=', $id)->get();  
        $to_approve = DB::table('leave_requests')->where('approved_by', '=', $id)->get();
  
        return view('leave.view',  compact('leave_requests','to_approve'));
      
       
    }
    public static function get_user_name($user_id)
    {
        $user_=DB::table('users')->select('name')->where([['id', '=', $user_id],])->first();
        
        return $user_;
    }

    public static function reject(Request $request)
    {
        $leaveid=$request->requestId;
        DB::table('leave_requests')->where('id', '=',  $leaveid)->update(['status' =>'rejected']); 

        return redirect()->to('/leave'); 
      
        
    }
    public static function approve(Request $request)
    {
        $leaveid=$request->requestId;
        DB::table('leave_requests')->where('id', '=',  $leaveid)->update(['status' => 'approved']);

        return redirect()->to('/leave');    
    }

    /**
     * Store new events.
     *
     * @return \Illuminate\View\View
     * @param  \App\Http\Request   $request
     */
    public function store(Request $request)
    {
        if($request->leave_id_=="add"){
        
        $id = auth()->id();
        

        DB::table('leave_requests')->insert([
            [
                'reason' => $request->reason,
                'start' =>$request->start,
                'end'=>$request->end,
                'request_by'=>auth()->id(),
                'approved_by'=>auth()->user()->supervisor_manager,
                'status'=>"pending",
                'category'=>$request->category,
                'type'=>$request->type,
            ],
        ]);
        }else{
            DB::table('leave_requests')->where('id', '=', $request->leave_id_)->update(
                array(
                    'reason' => $request->reason,
                    'start' =>$request->start,
                    'end'=>$request->end,
                    'request_by'=>auth()->id(),
                    'approved_by'=>auth()->user()->supervisor_manager,
                    'category'=>$request->category,
                    'type'=>$request->type,
                )
            );
    

        }
       
        return redirect()->to('/leave'); 
    }
    public static function destroy(Request $request)
    {
        $leaveid=$request->requestId;
        DB::table('leave_requests')->where('id', '=',  $leaveid)->delete();
        return redirect()->to('/leave'); 
    }
    

    public function index2(Request $request)
    {
        
        $leaveid=$request->requestId;
        
        if($leaveid=="add"){
            $leave_req =null;
            return view('leave.add_edit',compact('leaveid','leave_req'));
            
        }else{
            $leave_req = DB::table('leave_requests')->where('id', '=', $leaveid)->first(); 
           
            return view('leave.add_edit',compact('leaveid','leave_req'));
        }
       
        
      
       
    }

}
