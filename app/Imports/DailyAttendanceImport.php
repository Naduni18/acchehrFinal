<?php

namespace App\Imports;

use App\DailyAttendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DailyAttendanceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DailyAttendance([
            'emp_id' => $row['emp_id'],
            'date' => $row['date'],
            'start' => $row['start'],
            'end' => $row['end'],
        ]);
    }
}


// change this to import data to an array instead of db...........