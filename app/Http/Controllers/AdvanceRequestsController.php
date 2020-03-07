<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\DB;

class AdvanceRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['advance_req'] = DB::table('advance_requests')->get();

        return view('advance_payment.advance',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('advance_requests')
        ->updateOrInsert(
            ['id' => $request->id],
            [
            'emp_id' => $request->emp_id,
            'approved_by'=>$request->approved_by,
            'amount'=>$request->amount,
            'notes'=>$request->notes,
            'status'=>$request->status,
            'for_year'=>$request->for_year,
            'for_month'=>$request->for_month
            ]
        );
        return Response::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('advance_requests')->where('id', '=', $id)->first();
        return Response::json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('advance_requests')->where('id', '=', $id)->delete();
        return view('advance_payment.advance',$data);
    }
}
