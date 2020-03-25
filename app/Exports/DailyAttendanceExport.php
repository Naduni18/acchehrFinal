<?php

namespace App\Exports;

use App\DailyAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class DailyAttendanceExport implements FromCollection, WithHeadings
{
    
protected $this_month;

function __construct($this_month) {
       $this->this_month = $this_month;
}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->this_month==true){

            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            return DailyAttendance::whereYear('date','=',$year)->whereMonth('date','=',$month)->get();

        }else{
            return DailyAttendance::all();
        }
        
    }

    public function headings(): array
    {
        return [
            'id',
            'emp_id',
            'date',
            'start',
            'end',
            'created_at',
            'updated_at',
        ];
    }
}
