<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use Illuminate\Http\Request;
use App\Exports\DailyAttendanceExport;
use App\Imports\DailyAttendanceImport;
use Maatwebsite\Excel\Facades\Excel;


class DailyAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyAttendance = DailyAttendance::all();

        return view('daily_attendance.index')->with('dailyAttendance', $dailyAttendance);
    }


     /**
     * Import function
     */
    public function import(Request $request)
    {
        if ($request->file('imported_file')) {
            Excel::import(new DailyAttendanceImport(), request()->file('imported_file'));
            return back();
        }
    }


    /**
     * Export function
     */
    public function export()
    {
        $this_month=false;
        return Excel::download(new DailyAttendanceExport($this_month), 'DailyAttendance.xlsx');
    }

    /**
     * Export function
     */
    public function export_this_month()
    {
        $this_month=true;
        return Excel::download(new DailyAttendanceExport($this_month), 'DailyAttendance.xlsx');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyAttendance $dailyAttendance)
    {
        //
    }

}
