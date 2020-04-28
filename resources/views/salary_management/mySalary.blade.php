@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
  
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-white shadow">
                <div class="card-body">
                    <div class='row'> 
                    <div class="table-responsive">
<!-- implement search box to search by employee id/year/month -->
   
        <table class="table align-items-center table-flush">
                    <tr>
                    <th>ID</th>
                    <td>{{$record->id}}</td>
                    </tr>
                    <tr>
                    <th>Employee id</th>
                    <td>{{$record->emp_id}}</td>
                    </tr>
                    <tr>
                    <th>Year</th>
                    <td>{{$record->year_}}</td>
                    </tr>
                    <tr>
                     <th>Month</th>
                    <td>{{$record->for_month}}</td>
                    </tr>
                    <tr>
                    <th style="background: #16cbef;">Basic Salary</th>
                    <td style="background: #16cbef;">{{$record->basic_salary}}</td>
                    </tr>
                    <tr>
                    <th> variable  allowance</th>
                    <td>{{$record->variable_allowance}}</td>
                    </tr>
                    <tr>
                    <th>Incentice</th>
                    <td>{{$record->incentice}}</td>
                    </tr>
                    <tr>
                    <th>Holiday  Allowance</th>
                    <td>{{$record->holiday_allowance}}</td>
                    </tr>
                    <tr>
                    <th>Commission</th>
                    <td>{{$record->commission}}</td>
                    </tr>
                    <tr>
                    <th>Phone  Allowance</th>
                    <td>{{$record->phone_allowance}}</td>
                    </tr>
                    <tr>
                    <th style="background: #16cbef;">Gross  Salary</th>
                    <td style="background: #16cbef;">{{$record->gross_salary}}</td>
                    </tr>
                    <tr>
                    <th>EPF  Employee  Cont</th>
                    <td>{{$record->epf_employee_cont}}</td>
                    </tr>
                    <tr>
                    <th>Salary  Advance</th>
                    <td>{{$record->salary_advance}}</td>
                    </tr>
                    <tr>
                    <th>Telephone  Deduction</th>
                    <td>{{$record->telephone_deduction}}</td>
                    </tr>
                    <tr>
                    <th>No  Pay</th>
                    <td>{{$record->no_pay}}</td>
                    </tr>
                    <tr>
                    <th>Staff  Loan</th>
                    <td>{{$record->staff_loan}}</td>
                    </tr>
                    <tr>
                    <th>Paye  Tax</th>
                    <td>{{$record->paye_tax}}</td>
                    </tr>
                    <tr>  
                    <th>Total  Deductions</th>
                    <td>{{$record->total_deductions}}</td>
                    </tr>
                    <tr>
                    <th style="background: #16cbef;">Net  Salary</th>
                    <td style="background: #16cbef;">{{$record->net_salary}}</td>
                    </tr>
                    <tr>     
                    <th>EPF  Company  Cont</th>
                    <td>{{$record->epf_company_cont}}</td>
                    </tr>
                    <tr>
                    <th>ETF  Company  Cont</th>
                    <td>{{$record->etf_company_cont}}</td>
                    </tr>
                    <tr>
                    <th>Remitted  Amount</th>
                    <td>{{$record->remitted_amount}}</td>
                    </tr>
                    <tr>
                    <th>Date</th>
                    <td>{{$record->date_}}</td>
                    </tr>
                
           
        </table>   
    </div>  
    </div>          
                </div>
            </div>
        </div>
    </div>
<script>

document.addEventListener('DOMContentLoaded', function() {
      
});

</script>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush