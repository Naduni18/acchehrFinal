@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
            @can('isManager')
            <div>
            <a class="btn btn-success" href="{{ route('leave.index3') }}">
            <i class="fas fa-chart-line"></i> {{ __('View Summarry') }}
           </a>     
            </div>
            @endcan
            @can('isAdmin')
            <div>
            <a class="btn btn-success" href="{{ route('leave.index4') }}">
            <i class="fas fa-chart-line"></i> {{ __('View Summarry') }}
           </a>     
            </div>
            @endcan
            </br>
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
                    <button formaction="{{ route('leave.index2') }}" name="add" type="submit" class="btn btn-primary" >
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
                                    <th scope="col">{{ __('Document') }}</th>
                                    <th scope="col">{{ __('Reason') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Start time') }}</th>
                                    <th scope="col">{{ __('End time') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Type') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leave_requests as $leave_req)
                               
                                    <tr>
                                    @if($leave_req->document_id != null)
<td><a href="{{ route('leave.download_file',$leave_req->document_id) }}" >
<span class="btn-inner--icon"><img width="24" height="24" src="{{ asset('argon') }}/img/icons/common/file-download-solid.svg"></span></a></td>
@else
<td></td>
@endif
                                        <td>{{ $leave_req->reason}}</td>
                                        <td>{{ $leave_req->date_ }}</td>
                                        <td>{{ $leave_req->start }}</td>
                                        <td>{{ $leave_req->end }}</td>
                                        <td>{{ $leave_req->status }}</td>
                                        <td>{{ $leave_req->category }}</td>
                                        <td>{{ $leave_req->type }}</td>
                                        @if($leave_req->status === "pending")
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <form  method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            <input type="number" name="requestId" id="input-requestId" value="{{$leave_req->id}}" style="visibility:hidden;">
                                                            <button formaction="{{ route('leave.destroy') }}" name="delete" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete?") }}') ? this.parentElement.submit() : ''" >
                                                                {{ __('Delete') }}
                                                            </button>
                                            
                                                            <button formaction="{{ route('leave.index2') }}" name="edit" type="submit" class="dropdown-item">
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
                                                    
                                                <p style="font-size:14px;padding:10px;">You manager already {{ $leave_req->status }}ed this request</p>  
                                                    
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
                      @can('isManager') 
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr><label style="text-align: center;">{{ __('Requests from employees') }}</label></tr>
                                <tr>
                                    <th scope="col">{{ __('Document') }}</th>
                                    <th scope="col">{{ __('Reason') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Start time') }}</th>
                                    <th scope="col">{{ __('End time') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Type') }}</th>
                                    <th scope="col">{{ __('Request by') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($to_approve as $leave_req)
                               
                                    <tr>
                                    @if($leave_req->document_id != null)
                                    <td><a href="{{ route('leave.download_file',$leave_req->document_id) }}" >
<span class="btn-inner--icon"><img width="24" height="24" src="{{ asset('argon') }}/img/icons/common/file-download-solid.svg"></span></a></td>
@else
<td></td>
@endif
                                        <td>{{ $leave_req->reason}}</td>
                                        <td>{{ $leave_req->date_ }}</td>
                                        <td>{{ $leave_req->start }}</td>
                                        <td>{{ $leave_req->end }}</td>
                                        <td>{{ $leave_req->status }}</td>
                                        <td>{{ $leave_req->category }}</td>
                                        <td>{{ $leave_req->type }}</td>


                                        <td>@php
                                        $val =  \App\Http\Controllers\LeaveRequestController::get_user_name($leave_req->request_by);
                                        $jsonval =json_encode($val);
                                        $finalval = json_decode($jsonval, true);
                                        echo $finalval['name'];
                                        @endphp
                                        </td>
                                        @if($leave_req->status === "pending")
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <form  method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            <input type="number" name="requestId" id="input-requestId" value="{{$leave_req->id}}" style="visibility:hidden;">
                                                            <button formaction="{{ route('leave.reject') }}" name="reject" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to reject?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Reject') }}
                                                            </button>
                                                        
                                                            <button formaction="{{ route('leave.approve') }}" name="approve" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to approve?") }}') ? this.parentElement.submit() : ''">
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
                                                    
                                                <p style="font-size:14px;padding:10px;">You already {{ $leave_req->status }}ed this request</p>  
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
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