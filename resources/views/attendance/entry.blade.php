@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">
                      <div id="calendar" style="height: 200px"></div> 
                      </br></br></br></br>
                      @can('isManager') 
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Reason') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Start') }}</th>
                                    <th scope="col">{{ __('End') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Request by') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($to_approve as $missing_att)
                               
                                    <tr>
                                        <td>{{ $missing_att->reason}}</td>
                                        <td>{{ $missing_att->date }}</td>
                                        <td>{{ $missing_att->start }}</td>
                                        <td>{{ $missing_att->end }}</td>
                                        <td>{{ $missing_att->status }}</td>
                                        <td>@php
                                        echo \App\Http\Controllers\MissingAttendanceController::get_manager($missing_att->request_by);
                                        @endphp
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                <form action="{{ route('attendance.reject', $missing_att->id) }}" method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to reject?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Reject') }}
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('attendance.approve', $missing_att->id) }}" method="post">
                                                            @csrf
                                          
                                                            @method('post')
                                                            
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to approve?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Approve') }}
                                                            </button>
                                                        </form>   
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endcan
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" ></h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
      
        <button id="edit_btn" type="button" class="btn btn-primary" data-dismiss="modal" style="visibility:hidden;">Edit event</button>
        <button id="delete_btn" type="button" class="btn btn-primary" data-dismiss="modal" style="visibility:hidden;">Delete Event</button>
        
        <button id="close_btn" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>
<!-- Modal end -->

<!-- Modal -->
<div id="addEventModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Event</h4>
      </div>
      <div class="modal-body">
      <form id="addEventForm" method="post" action="{{ route('attendance.store') }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('reason') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reason">{{ __('Reason') }}</label>
                                    <input type="text" name="reason" id="input-reason" class="form-control form-control-alternative{{ $errors->has('reason') ? ' is-invalid' : '' }}" placeholder="{{ __('Reason') }}" value="{{ old('reason') }}" required autofocus>

                                    @if ($errors->has('reason'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('reason') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date">{{ __('Date') }}</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="{{ __('Date') }}" value="{{ old('date') }}" autofocus>

                                    @if ($errors->has('date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-start">{{ __('Start') }}</label>
                                    <input type="time" name="start" id="input-start" class="form-control form-control-alternative{{ $errors->has('start') ? ' is-invalid' : '' }}" placeholder="{{ __('Start') }}" value="{{ old('start') }}" autofocus>

                                    @if ($errors->has('start'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-end">{{ __('End') }}</label>
                                    <input type="time" name="end" id="input-end" class="form-control form-control-alternative{{ $errors->has('end') ? ' is-invalid' : '' }}" placeholder="{{ __('End') }}" value="{{ old('end') }}" autofocus>

                                    @if ($errors->has('end'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Save') }}</button>
                                    <button id="close" type="button" class="btn btn-primary mt-4" data-dismiss="modal">Close</button>
                                </div>
                            </div>
      </form>
      </div>
    </div>

  </div>
</div>
<!-- Modal end -->
                    </div> 
                    </div>
                </div>
            </div>
        </div>
        <script>


document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
      
    plugins: [ 'dayGrid', 'list','interaction','bootstrap','rrule','moment','googleCalendar'  ],
    themeSystem: 'bootstrap',
    height: 200,
    aspectRatio: 3.5,
    timeZone: 'Asia/Colombo',
    height: 'auto',
    fixedWeekCount:false,
    slotDuration: '00:15:00',
    slotLabelInterval:'01:00:00',
    navLinks:true,
    nowIndicator: true,
    selectable: true,
    selectMirror:true,
    slotLabelFormat:{
  hour: 'numeric',
  minute: '2-digit',
  omitZeroMinute: false,
  
},
businessHours: {
// days of week. an array of zero-based day of week integers (0=Sunday)
daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - saturday

startTime: '09:00', // a start time 
endTime: '16:00', // an end time 
},
    views: {
      listMonth: { buttonText: 'List' }
    },
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'addEventButton listMonth,dayGridMonth'
    },
   
eventSources: [
{
events:{!! $ce !!},
id:'personal',
}
],
customButtons: {
    addEventButton: {
      text: 'Apply new',
      click: function() {
        $( "#addEventModel" ).modal('toggle');
      }
    }
  },
  eventLimit: true,
eventClick: function(info) {
info.jsEvent.preventDefault(); // don't let the browser navigate
if(info.event.source.id=='google'){
 
  $('.modal-title').html('Holiday/Public Event');
  $('.modal-body').html(info.event.title);
  $( "#myModal" ).modal('toggle');
  
}else{
  $('.modal-title').html('Event');
  $('#edit_btn').css('visibility', 'visible');
  $('#delete_btn').css('visibility', 'visible');
  $('.modal-body').html(info.event.title);
  $( "#myModal" ).modal('toggle');
}
},
}); 
     
calendar.render();


});

</script>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush