@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-white shadow">
                <div class="card-body">
                     
                    <div class='row'>  
                        <div style="padding:10px;">
                            <form action="" enctype="multipart/form-data">
                                <button formaction="{{ route('salaryManagements.export') }}" class="btn btn-primary mt-4" type="submit">Generate this month receipts</button>
                            </form> 
                        </div>
                    </div> 
                    <br/>
                    <div class='row'> 
<!-- implement search box to search by employee id/year/month -->
    @if(count($salary))
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Employee id</td>
                <td>Year</td>
                <td>Month</td>
                <td>Basic Salary</td>
            </tr>
            </thead>
            @foreach($salary as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->emp_id}}</td>
                    <td>{{$record->year_}}</td>
                    <td>{{$record->for_month}}</td>
                    <td>{{$record->basic_salary}}</td>
                    <td>{{$record->variable_allowance}}</td>
                    <td>{{$record->incentice}}</td>
                    <td>{{$record->holiday_allowance}}</td>
                    <td>{{$record->commission}}</td>
                    <td>{{$record->phone_allowance}}</td>
                    <td>{{$record->gross_salary}}</td>
                    <td>{{$record->epf_employee_cont}}</td>
                    <td>{{$record->salary_advance}}</td>
                    <td>{{$record->telephone_deduction}}</td>
                    <td>{{$record->no_pay}}</td>
                    <td>{{$record->staff_loan}}</td>
                    <td>{{$record->paye_tax}}</td>
                    <td>{{$record->total_deductions}}</td>
                    <td>{{$record->net_salary}}</td>
                    <td>{{$record->epf_company_cont}}</td>
                    <td>{{$record->etf_company_cont}}</td>
                    <td>{{$record->remitted_amount}}</td>
                    <td>{{$record->date_}}</td>
                </tr>
            @endforeach
        </table>
    @endif    
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