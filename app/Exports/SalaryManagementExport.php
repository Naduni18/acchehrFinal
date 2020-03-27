<?php

namespace App\Exports;

use App\Salary_managements;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryManagementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Salary_managements::all();
    }
}
