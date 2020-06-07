@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">

                    <form  method="post">
                     @csrf
                                          
                    @method('post')
                    <div class="row">
                    <input type="text" name="requestId" id="input-requestId" value="add" style="visibility:hidden;">
                    </div>
                    <div class="row"> 
                    <div class="col d-flex justify-content-end">                  
                    <button formaction="{{ route('advance_payment.index2') }}" name="add" type="submit" class="btn btn-primary" >
                    {{ __('Add new Request') }}
                    </button>
                    </div>
                    </div>
                    </form>
                    <br> 
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr><label style="text-align: center;">{{ __('Your requests') }}</label></tr>
                                <tr>
                                    <th scope="col">{{ __('Request ID') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Notes') }}</th>
                                    <th scope="col">{{ __('For year') }}</th>
                                    <th scope="col">{{ __('For month') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advance_requests as $advance_req)
                               
                                    <tr>
                                    <td>{{ $advance_req->id}}</td>
                                        <td>{{ $advance_req->amount}}</td>
                                        <td>{{ $advance_req->notes }}</td>
                                        <td>{{ $advance_req->for_year }}</td>
                                        <td>{{ $advance_req->for_month }}</td>
                                        <td>{{ $advance_req->status }}</td>
                                        @if($advance_req->status === "pending")
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <form  method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            <input type="number" name="requestId" id="input-requestId" value="{{$advance_req->id}}" style="visibility:hidden;">
                                                            <button formaction="{{ route('advance_payment.destroy') }}" name="delete" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete?") }}') ? this.parentElement.submit() : ''" >
                                                                {{ __('Delete') }}
                                                            </button>
                                            
                                                            <button formaction="{{ route('advance_payment.index2') }}" name="edit" type="submit" class="dropdown-item">
                                                                {{ __('Edit') }}
                                                            </button>
                                                        </form>   
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        @else
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <p style="font-size:14px;padding:10px;">You manager already {{ $advance_req->status }}ed this request</p>  
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div></div>
                      </br></br></br></br>
                      <div class="card bg-white shadow">
                    <div class="card-body">
                      @can('isAdmin') 
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr><label style="text-align: center;">{{ __('Requests from employees') }}</label></tr>
                                <tr>
                                    <th scope="col">{{ __('Request ID') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Notes') }}</th>
                                    <th scope="col">{{ __('For year') }}</th>
                                    <th scope="col">{{ __('For month') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Request by') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($to_approve as $advance_req)
                               
                                    <tr>
                                        <td>{{ $advance_req->id}}</td>
                                        <td>{{ $advance_req->amount}}</td>
                                        <td>{{ $advance_req->notes }}</td>
                                        <td>{{ $advance_req->for_year }}</td>
                                        <td>{{ $advance_req->for_month }}</td>
                                        <td>{{ $advance_req->status }}</td>


                                        <td>@php
                                        $val =  \App\Http\Controllers\AdvanceRequestsController::get_user_name($advance_req->request_by);
                                        $jsonval =json_encode($val);
                                        $finalval = json_decode($jsonval, true);
                                        echo $finalval['name'];
                                        @endphp
                                        </td>
                                        @if($advance_req->status === "pending")
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <form  method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            <input type="number" name="requestId" id="input-requestId" value="{{$advance_req->id}}" style="visibility:hidden;">
                                                            <button formaction="{{ route('advance_payment.reject') }}" name="reject" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to reject?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Reject') }}
                                                            </button>
                                                        
                                                            <button formaction="{{ route('advance_payment.approve') }}" name="approve" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to approve?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Approve') }}
                                                            </button>
                                                        </form>   
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        @else
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <p style="font-size:14px;padding:10px;">You already {{ $advance_req->status }}ed this request</p>  
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br><br>
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr><label style="text-align: center;">{{ __('This month approved requests') }}</label></tr>
                                <tr>
                                
                                    <th scope="col">{{ __('Employee') }}</th>
                                    <th scope="col">{{ __('Total Amount') }}</th>
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach ($advance_requests_this_month_total as $advance_reqs)
                            <td>@php
                                        $val =  \App\Http\Controllers\AdvanceRequestsController::get_user_name($advance_reqs->request_by);
                                        $jsonval =json_encode($val);
                                        $finalval = json_decode($jsonval, true);
                                        echo $finalval['name'];
                                        @endphp
                            </td>
                            <td>{{ $advance_reqs->amount }}</td>
                            
                            @endforeach
                            </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr><label style="text-align: center;">{{ __('Last month approved requests') }}</label></tr>
                                <tr>
                                    <th scope="col">{{ __('Employee') }}</th>
                                    <th scope="col">{{ __('Total Amount') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach ($advance_requests_last_month_total as $advance_reqs)
                            <td>@php
                                        $val =  \App\Http\Controllers\AdvanceRequestsController::get_user_name($advance_reqs->request_by);
                                        $jsonval =json_encode($val);
                                        $finalval = json_decode($jsonval, true);
                                        echo $finalval['name'];
                                        @endphp
                            </td>
                            <td>{{ $advance_reqs->amount }}</td>
                            
                            @endforeach
                            </tr>
                            </tbody>
                        </table>
                        @endcan



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