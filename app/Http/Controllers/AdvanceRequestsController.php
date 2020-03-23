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
    
    class AdvanceRequestsController extends Controller
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
      
            return view('advance_payment.index',  compact('leave_requests','to_approve'));
          
           
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
    
            return redirect()->to('/advance_payment'); 
          
            
        }
        public static function approve(Request $request)
        {
            $leaveid=$request->requestId;
            DB::table('leave_requests')->where('id', '=',  $leaveid)->update(['status' => 'approved']);
    
            return redirect()->to('/advance_payment');    
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
            $doc = $request->file('leave_document');
            $manager_supervisor = DB::table('users')->where('id', '=', $id)->first();
            if($doc!=null){
                $uuid = Uuid::generate()->string;
                $leave_doc_name = $uuid.'.'.$doc->getClientOriginalExtension();
                $folder = '/uploads/leave_documents/';
                $filePath = $folder . $leave_doc_name;
                $this->uploadOne($doc, $folder, 'public', $leave_doc_name);
            }else{
                $leave_doc_name =null;
            } 
            if($request->leave_id_=="add"){
          
            DB::table('leave_requests')->insert([
                [
                    'document_id'=>$leave_doc_name,
                    'reason' => $request->reason,
                    'start' =>$request->start,
                    'end'=>$request->end,
                    'request_by'=>$id,
                    'approved_by'=>$manager_supervisor->supervisor_manager,
                    'status'=>"pending",
                    'category'=>$request->category,
                    'type'=>$request->type,
                    'created_at'=>now(),
                ],
            ]);
            }else{
                DB::table('leave_requests')->where('id', '=', $request->leave_id_)->update(
                    array(
                        'document_id'=>$leave_doc_name,
                        'reason' => $request->reason,
                        'start' =>$request->start,
                        'end'=>$request->end,
                        'request_by'=>$id,
                        'approved_by'=>$manager_supervisor->supervisor_manager,
                        'category'=>$request->category,
                        'type'=>$request->type,
                        'updated_at'=>now(),
                    )
                );
        
    
            }
           
            return redirect()->route('advance_payment')->withStatus(__('Leave request successfully updated.'));
        }
        public static function destroy(Request $request)
        {
            $leaveid=$request->requestId;
            DB::table('leave_requests')->where('id', '=',  $leaveid)->delete();
            return redirect()->to('/advance_payment'); 
        }
        
    
        public function index2(Request $request)
        {
            
            $leaveid=$request->requestId;
            
            if($leaveid=="add"){
                $leave_req =null;   
            }else{
                $leave_req = DB::table('leave_requests')->where('id', '=', $leaveid)->first();     
            }
           
            
            return view('advance_payment.edit',compact('leaveid','leave_req'));
           
        }
    
         public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
        {
            $name = !is_null($filename) ? $filename : Str::random(25);
    
            $path =storage_path('uploads/leave_documents/'.$filename.'');
    
            if( Storage::exists($path)){
              
             Storage::disk('public')->delete('uploads/leave_documents/'.$filename.'');  
            }
            $file = $uploadedFile->storeAs($folder, $name, $disk);
          
            return $file;
        } 
    
          /**
         * Store new events.
         *
         * @return \Illuminate\View\View
         * 
         */
        public function download_file($file_name)
        {
            return response()->download(storage_path("app/public/uploads/leave_documents/{$file_name}"));
        }
    
    }
    