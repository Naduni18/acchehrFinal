@extends('layouts.app')

@section('content')
    @include('layouts.headers.plane')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
            <div>
            <a class="btn btn-success" href="{{ route('trainingScheduleSummary.index') }}">
            <i class="fas fa-chart-line"></i> {{ __('View Summarry') }}
           </a>     
            </div>
            </br>
                <div class="card bg-white shadow">
                
                    <div class="card-body">
                      <div id="calendar" style="height: 800px;"></div>  
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" ></h4>
      </div>
      <div class="modal-body">
      <form id="editEventForm" method="post"  autocomplete="off">
       @csrf
       <h3 id="eventTitle"></h3>
       
       <input type="number" name="eventId" id="input-eventId" style="visibility:hidden;">
      </div>
      <div class="modal-footer">
      @can('isManager')
        <button id="edit_btn"  type="submit" formaction="{{ route('trainingScheduleEdit') }}" name="edit" class="btn btn-primary" style="visibility:hidden;">Edit event</button>
        <button id="delete_btn" type="submit" name="delete" formaction="{{ route('trainingSchedule.delete') }}" class="btn btn-primary" style="visibility:hidden;">Delete Event</button>
        @endcan  
      <button id="close_btn" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </form>
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
        <h4 class="modal-title">Add New Training Session</h4>
      </div>
      <div class="modal-body">
      <form id="addEventForm" method="post" action="{{ route('trainingSchedule.store') }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                 
                                <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-start">{{ __('Start') }}</label>
                                    <input type="datetime-local" name="start" id="input-start" class="form-control form-control-alternative{{ $errors->has('start') ? ' is-invalid' : '' }}" placeholder="{{ __('Start') }}" value="{{ old('start') }}" autofocus>

                                    
                                </div>
                                <div class="form-group{{ $errors->has('end') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-end">{{ __('End') }}</label>
                                    <input type="datetime-local" name="end" id="input-end" class="form-control form-control-alternative{{ $errors->has('end') ? ' is-invalid' : '' }}" placeholder="{{ __('End') }}" value="{{ old('end') }}" autofocus>

                                    
                                </div>
                               
                                <div class="form-group{{ $errors->has('assignesto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-assignesto">{{ __('Assignes to') }}</label>
                                    <select multiple size="3" name="assignesto[]" id="input-assignesto" class="form-control form-control-alternative{{ $errors->has('assignesto') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignes to') }}"  required autofocus>

                                    @foreach($assignees_array as $key)
                                     
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>

                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('conducted_by') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-conducted_by">{{ __('Conducted by') }}</label>
                                    <select name="conducted_by" id="input-conducted_by" class="form-control form-control-alternative{{ $errors->has('conducted_by') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignes to') }}"  required autofocus>

                                    @foreach($assignees_array as $key)
                                     
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>

                                    @endforeach
                                    </select>
                        
                                </div>
                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-location">{{ __('location') }}</label>
                                    <input type="text" name="location" id="input-location" class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ __('location') }}" value="{{ old('location') }}" required autofocus>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-notes">{{ __('notes') }}</label>
                                    <input type="text" name="notes" id="input-notes" class="form-control form-control-alternative{{ $errors->has('notes') ? ' is-invalid' : '' }}" placeholder="{{ __('notes') }}" value="{{ old('notes') }}" required autofocus>

                                    @if ($errors->has('notes'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <p id='test'></p>
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
          googleCalendarApiKey: 'AIzaSyACMTvM6xtGLSgkyLZqKw2t4chXf-tw8u8',
    plugins: [ 'dayGrid', 'timeGrid', 'list','interaction','bootstrap','rrule','moment','googleCalendar'  ],
    themeSystem: 'bootstrap',
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
      listDay: { buttonText: 'Todays training sessions' },
      listWeek: { buttonText: 'This week training sessions' },
      listMonth: { buttonText: 'This month training sessions' }
    },
    footer:{
      center: 'listDay listWeek listMonth'
    },
    header: {
      left: 'prevYear,prev,next,nextYear today',
      center: 'title',
      right: 'addEventButton dayGridMonth,timeGridWeek,timeGridDay'
    },
   
eventSources: [
{
events:{!! $ce !!},
id:'personal',
},
{ 
googleCalendarId: 'en.lk#holiday@group.v.calendar.google.com',
id:'google',
}
],
customButtons: {
    addEventButton: {
      text: 'Add Training Session ',
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
  $('#eventTitle').html("Event :"+info.event.title);
  $( "#myModal" ).modal('toggle');
  
}else{
  $('.modal-title').html('Event');
  $('#edit_btn').val(info.event.id);
  $('#edit_btn').css('visibility', 'visible');
  $('#delete_btn').css('visibility', 'visible');
  $('#input-eventId').val(info.event.id);
  $('#eventTitle').html("Event : "+info.event.title+"</br> Start : "+info.event.start+" </br>End: "+info.event.end);
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