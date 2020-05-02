@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">
                    <div class='row'>
                        <div class='col' style="padding:10px;">
                            <form id="upload_excel" method="post" enctype="multipart/form-data" action="{{ route('dailyAttendance.import') }}" autocomplete="off">
                                    @csrf                                                       
                                    @method('post')                                                               
                                    <input type="file" name="imported_file" required>         
                            <button style="margin-left: 10px;" class="btn btn-info" type="submit">Upload attendance</button>                        
                            </form>
                        </div>  
                        </div> 
                        <div class='row'>  
                        <div style="padding:10px;">
                            <form action="" enctype="multipart/form-data">
                                <button formaction="{{ route('dailyAttendance.export') }}" class="btn btn-primary mt-4" type="submit">Download all attendance</button>
                                
                            </form> 
                        </div>
                    </div>
                    
                    <p>{{ session('val') }}</p>
                   
                    <br/>
<!-- implement search box to search by employee id/year/month -->


<div style="height:600px;overflow:auto;">
    
        <table id="myTable" class="table align-items-center table-flush">
            <thead>
            <tr>
                <td>ID</td>
                <td>Employee id</td>
                <td>Date</td>
                <td>Morning IN</td>
                <td>Morning OUT</td>
                <td>Afternoon IN</td>
                <td>Afternoon OUT</td>
                <td>Status</td>
            </tr>
            </thead>
            @if(count($dailyAttendance))
            @foreach($dailyAttendance as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->emp_id}}</td>
                    <td>{{$record->date}}</td>
                    <td>{{$record->in_am}}</td>
                    <td>{{$record->out_am}}</td>
                    <td>{{$record->in_pm}}</td>
                    <td>{{$record->out_pm}}</td>
                    <td>{{$record->status}}</td>
                </tr>
            @endforeach
            @else
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif 
        </table>
      
    </div>
    
   
                    </div> 
                </div>
            </div>
        </div>
    </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush