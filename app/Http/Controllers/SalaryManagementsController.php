<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = DB::table('salary_managements')->get();

        return view('salary_management.index')->with('salary', $salary);
    }

    /**
     * Export function
     */
    public function export()
    {
        //return Excel::download(new SalaryManagementExport(), 'salary.xlsx');
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
     * @param  \App\Salary_managements  $salary_managements
     * @return \Illuminate\Http\Response
     */
    public function show(Salary_managements $salary_managements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary_managements  $salary_managements
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary_managements $salary_managements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary_managements  $salary_managements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary_managements $salary_managements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary_managements  $salary_managements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary_managements $salary_managements)
    {
        //
    }
}
