<?php

    namespace App\Http\Controllers;
    
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Uuid;
    
    
    
    class TrainingScheduleController extends Controller
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
           
            $calender_events = DB::table('training_schedule')->get();
    
            $ce = $calender_events->toJson();
    
            $assignees_array = DB::table('users')->select('id','name')->get();
    
         
            
           return view('training_schedule.index',  compact('ce','assignees_array'));
          
           
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
            DB::table('training_schedule')->insertOrIgnore([
                [
                    'title' => $request->title,
                    'start' =>$request->start,
                    'end'=>$request->end,
                    'assigned_by'=>$id,
                    'conducted_by'=>$request->conducted_by,
                    'assigned_to'=>$assigned_to,
                    'location'=>$request->location,
                    'notes'=>$request->notes,
                    'created_at'=>now(),
                ],
            ]);
    
            return redirect()->to('/trainingSchedule'); 
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
    
            DB::table('training_schedule')->where('id', '=', $event_Id)->delete();
    
            return redirect()->to('/trainingSchedule'); 
            
        }
     
    }
    