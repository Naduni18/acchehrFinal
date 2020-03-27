<?php

    namespace App\Http\Controllers;
    
    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;
    use Uuid;
    
    class SkillRatingController extends Controller
    {
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\View\View
         */
        public function index()
        {
            $id = auth()->id();
            $employees_array=DB::table('users')->where([['supervisor_manager', '=', $id],])->get();
      
            return view('skill_rating.index',  compact('employees_array'));
          
           
        }
     
        public function index2(Request $request)
        {
            
            $emp_to_rate_id=$request->employeeTorate;
            
            
            $emp_to_rate = DB::table('skill_rating')->where('emp_id', '=', $emp_to_rate_id)->first();     
            
           
            
            return view('skill_rating.edit',compact('emp_to_rate'));
            
           
        }

        /**
         * Store new events.
         *
         * @return \Illuminate\View\View
         * @param  \App\Http\Request   $request
         */
        public function store(Request $request)
        {
            
          
            $manager_supervisor = auth()->id();
           
            
                DB::table('skill_rating')->where('id', '=', $request->emp_to_rate_id_)->update(
                    array(
                        
                    'file_receivings' => $request->file_receivings,
                    'offers' => $request->offers,
                    'visa_grants'=> $request->visa_grants,
                    'IELTS_class_registrations'=> $request->IELTS_class_registrations,
                    'IELTS_exam_registrations'=> $request->IELTS_exam_registrations,
                    'total_kpi'=> $request->total_kpi,
                    )
                );
        
    
            
           
            return redirect()->route('skill_rating')->withStatus(__('ratings successfully updated.'));
        }
    
    }
    