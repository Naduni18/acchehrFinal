@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">
                    <form id="addEventForm" method="post" action="{{ route('skill_rating.index2') }}" autocomplete="off">
                    @csrf
                                          
                    @method('post')
                    <div class="form-group{{ $errors->has('employeeTorate') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-employeeTorate">{{ __('Select employee to rate:') }}</label>
                                    <select  name="employeeTorate" id="input-employeeTorate" class="form-control form-control-alternative{{ $errors->has('employeeTorate') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignes to') }}"  autofocus>

                                    @foreach($employees_array as $key)
                                     
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>

                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Rate') }}</button>
                                </div>
                            </div>
      </form>
      <br> 
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="empratetable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('File Receivings') }}</th>
                                    <th scope="col">{{ __('Offers') }}</th>
                                    <th scope="col">{{ __('Visa Grants') }}</th>
                                    <th scope="col">{{ __('IELTS Class Registrations') }}</th>
                                    <th scope="col">{{ __('IELTS Exam Registrations') }}</th>
                                    <th scope="col">{{ __('Total KPI') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emp_rating_array as $emp_rating)
                               
                                    <tr>
                                        <td>{{ $emp_rating->name}}</td>
                                        <td>{{ $emp_rating->file_receivings }}</td>
                                        <td>{{ $emp_rating->offers }}</td>
                                        <td>{{ $emp_rating->visa_grants }}</td>
                                        <td>{{ $emp_rating->IELTS_class_registrations }}</td>
                                        <td>{{ $emp_rating->IELTS_exam_registrations }}</td>
                                        <td>{{ $emp_rating->total_kpi }}</td>
                                        
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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