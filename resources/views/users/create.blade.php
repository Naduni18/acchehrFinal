@extends('layouts.app', ['title' => __('Employee Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add New Employee')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Employee Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('edit_user.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            
                            
                            <div class="pl-lg-4">
                            <input type="text" name="user_id_" id="input-user_id" hidden>
                            <fieldset name="Personal_information">
                            <legend class="heading-small text-muted mb-4" >Personal information</legend>
                                <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-avatar">{{ __('Avatar') }}</label>
                                    <input type="file" name="avatar" id="input-avatar" class="form-control form-control-alternative{{ $errors->has('avatar') ? ' is-invalid' : '' }}" >

                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('NIC') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-NIC">{{ __('NIC') }}</label>
                                    <input type="text" pattern="[0-9]{9}+[V]{1}|[0-9]{12}" name="NIC" id="input-NIC" class="form-control form-control-alternative{{ $errors->has('NIC') ? ' is-invalid' : '' }}" placeholder="{{ __('NIC') }}" required autofocus>

                                    @if ($errors->has('NIC'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('NIC') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" required>
                                </div>
                                <div class="form-group{{ $errors->has('current_job_position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current_job_position">{{ __('Current Job Title') }}</label>
                                    <input type="text" name="current_job_position" id="input-current_job_position" class="form-control form-control-alternative{{ $errors->has('current_job_position') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Job Title') }}"  required autofocus>

                                    @if ($errors->has('current_job_position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_job_position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-birthday">{{ __('Birthday') }}</label>
                                    <input type="date" name="birthday" id="input-birthday" class="form-control form-control-alternative{{ $errors->has('birthday') ? ' is-invalid' : '' }}" placeholder="{{ __('Birthday') }}"  autofocus>

                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('anniversary') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-anniversary">{{ __('Anniversary') }}</label>
                                    <input type="date" name="anniversary" id="input-anniversary" class="form-control form-control-alternative{{ $errors->has('anniversary') ? ' is-invalid' : '' }}" placeholder="{{ __('Anniversary') }}" autofocus>

                                    @if ($errors->has('anniversary'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('anniversary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_home') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone_home">{{ __('Phone Home') }}</label>
                                    <input type="text" pattern="[0]{1}[0-9]{9}" name="phone_home" id="input-phone_home" class="form-control form-control-alternative{{ $errors->has('phone_home') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Home') }}"  autofocus>

                                    @if ($errors->has('phone_home'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_home') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_mobile') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone_mobile">{{ __('Phone Mobile') }}</label>
                                    <input type="text" pattern="[0]{1}[0-9]{9}" name="phone_mobile" id="input-phone_mobile" class="form-control form-control-alternative{{ $errors->has('phone_mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Mobile') }}" required autofocus>

                                    @if ($errors->has('phone_mobile'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address_permanent') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address_permanent">{{ __('Address Permanent') }}</label>
                                    <input type="text" name="address_permanent" id="input-address_permanent" class="form-control form-control-alternative{{ $errors->has('address_permanent') ? ' is-invalid' : '' }}" placeholder="{{ __('Address Permanent') }}"  required autofocus>

                                    @if ($errors->has('address_permanent'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address_permanent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address_temporary') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address_temporary">{{ __('Address Temporary') }}</label>
                                    <input type="text" name="address_temporary" id="input-address_temporary" class="form-control form-control-alternative{{ $errors->has('address_temporary') ? ' is-invalid' : '' }}" placeholder="{{ __('Address Temporary') }}"  autofocus>

                                    @if ($errors->has('address_temporary'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address_temporary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('branch') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-branch">{{ __('Office Branch') }}</label>
                                    <input type="text" name="branch" id="input-branch" class="form-control form-control-alternative{{ $errors->has('branch') ? ' is-invalid' : '' }}" placeholder="{{ __('Office Branch') }}" required autofocus>

                                    @if ($errors->has('branch'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('branch') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('bank') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bank">{{ __('Bank') }}</label>
                                    <input type="text" name="bank" id="input-bank" class="form-control form-control-alternative{{ $errors->has('bank') ? ' is-invalid' : '' }}" placeholder="{{ __('Bank') }}" autofocus>

                                    @if ($errors->has('bank'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('bank_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bank_number">{{ __('Bank Account Number') }}</label>
                                    <input type="text" pattern="[0-9A-Z-]{10,}" max="34" name="bank_number" id="input-bank_number" class="form-control form-control-alternative{{ $errors->has('bank_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Bank Account Number') }}"  autofocus>

                                    @if ($errors->has('bank_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('bank_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bank_number">{{ __('Bank Account Number') }}</label>
                                    <input type="text" pattern="[0-9A-Z-]{10,}" max="34" name="bank_number" id="input-bank_number" class="form-control form-control-alternative{{ $errors->has('bank_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Bank Account Number') }}"  autofocus>

                                    @if ($errors->has('bank_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('user_role') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-user_role">{{ __('Role') }}</label>
                                    <select  name="user_role" id="input-user_role" class="form-control form-control-alternative{{ $errors->has('user_role') ? ' is-invalid' : '' }}" required >
                                    <option value="manager"  >Manager</option>
                                    <option value="employee" selected >Employee</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('supervisor_manager') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-supervisor_manager">{{ __('Supervisor/Manager') }}</label>
                                    <select  name="supervisor_manager" id="input-supervisor_manager" class="form-control form-control-alternative{{ $errors->has('supervisor_manager') ? ' is-invalid' : '' }}"  required autofocus>

                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach($managers_array as $key) 
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <hr class="dashed">
                            <fieldset name="Next_kin_details">
                            <legend class="heading-small text-muted mb-4">Next kin details</legend>
                                <div class="form-group{{ $errors->has('next_kin_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_name">{{ __('Name of the next kin') }}</label>
                                    <input type="text" name="next_kin_name" id="input-next_kin_name" class="form-control form-control-alternative{{ $errors->has('next_kin_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name of the next kin') }}"  autofocus>

                                    @if ($errors->has('next_kin_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('next_kin_occupation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_occupation">{{ __('Job title of the next kin') }}</label>
                                    <input type="text" name="next_kin_occupation" id="input-next_kin_occupation" class="form-control form-control-alternative{{ $errors->has('next_kin_occupation') ? ' is-invalid' : '' }}" placeholder="{{ __('Job title of the next kin') }}"  autofocus>

                                    @if ($errors->has('next_kin_occupation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('next_kin_address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_address">{{ __('Personal address of the next kin') }}</label>
                                    <input type="text" name="next_kin_address" id="input-next_kin_office_address" class="form-control form-control-alternative{{ $errors->has('next_kin_office_address') ? ' is-invalid' : '' }}" placeholder="{{ __('Personal address of the next kin') }}"  autofocus>

                                    @if ($errors->has('next_kin_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('next_kin_office_address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_office_address">{{ __('Office address of the next kin') }}</label>
                                    <input type="text" name="next_kin_office_address" id="input-next_kin_office_address" class="form-control form-control-alternative{{ $errors->has('next_kin_office_address') ? ' is-invalid' : '' }}" placeholder="{{ __('Office address of the next kin') }}" autofocus>

                                    @if ($errors->has('next_kin_office_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_office_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('next_kin_phone_mobile') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_phone_mobile">{{ __('Mobile phone number of the next kin') }}</label>
                                    <input type="text" pattern="[0]{1}[0-9]{9}" name="next_kin_phone_mobile" id="input-next_kin_phone_mobile" class="form-control form-control-alternative{{ $errors->has('next_kin_phone_mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('Mobile phone number of the next kin') }}" autofocus>

                                    @if ($errors->has('next_kin_phone_mobile'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_phone_mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('next_kin_phone_home') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-next_kin_phone_home">{{ __('Home phone number of the next kin') }}</label>
                                    <input type="text" pattern="[0]{1}[0-9]{9}" name="next_kin_phone_home" id="input-next_kin_phone_home" class="form-control form-control-alternative{{ $errors->has('next_kin_phone_home') ? ' is-invalid' : '' }}" placeholder="{{ __('Home phone number of the next kin') }}" autofocus>

                                    @if ($errors->has('next_kin_phone_home'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('next_kin_phone_home') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                            </fieldset>       
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        @include('layouts.footers.auth')
    </div>
@endsection