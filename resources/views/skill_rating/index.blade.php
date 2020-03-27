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
                                    <label class="form-control-label" for="input-employeeTorate">{{ __('Employee list') }}</label>
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