<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary_managements extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'year_','for_month','basic_salary','variable_allowance','incentice','holiday_allowance',
        'commission','phone_allowance','gross_salary','epf_employee_cont','salary_advance','telephone_deduction','no_pay',
        'staff_loan','paye_tax','total_deductions','net_salary','epf_company_cont','etf_company_cont','remitted_amount','date_',
    ];
}
