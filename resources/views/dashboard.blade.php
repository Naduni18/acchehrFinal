@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
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
       <h1 id="eventTitle"></h1>
       
       <input type="number" name="eventId" id="input-eventId" style="visibility:hidden;">
      </div>
      <div class="modal-footer">
      @can('isManager')
        <button id="edit_btn"  type="submit" formaction="{{ route('editEvent') }}" name="edit" class="btn btn-primary" style="visibility:hidden;">Edit event</button>
        <button id="delete_btn" type="submit" name="delete" formaction="{{ route('home.delete') }}" class="btn btn-primary" style="visibility:hidden;">Delete Event</button>
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
        <h4 class="modal-title">Add New Event</h4>
      </div>
      <div class="modal-body">
      <form id="addEventForm" method="post" action="{{ route('home.store') }}" autocomplete="off">
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
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                                
                                <div class="form-group{{ $errors->has('startTime') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-startTime">{{ __('Start Time') }}</label>
                                    <input type="time" name="startTime" id="input-startTime" class="form-control form-control-alternative{{ $errors->has('startTime') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Time') }}" value="{{ old('startTime') }}" autofocus>

                                    @if ($errors->has('startTime'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('startTime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('endTime') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-endTime">{{ __('End Time') }}</label>
                                    <input type="time" name="endTime" id="input-endTime" class="form-control form-control-alternative{{ $errors->has('endTime') ? ' is-invalid' : '' }}" placeholder="{{ __('End Time') }}" value="{{ old('endTime') }}" autofocus>

                                    @if ($errors->has('endTime'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('endTime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <fieldset style="border:groove;padding:5px;">
                                <legend style="font-size:12px;">  &nbsp&nbsp&nbsp&nbsp One day event (set this values only for one day event)</legend>
                                <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-start">{{ __('Start') }}</label>
                                    <input type="date" name="start" id="input-start" class="form-control form-control-alternative{{ $errors->has('start') ? ' is-invalid' : '' }}" placeholder="{{ __('Start') }}" value="{{ old('start') }}" autofocus>

                                    @if ($errors->has('start'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-end">{{ __('End') }}</label>
                                    <input type="date" name="end" id="input-end" class="form-control form-control-alternative{{ $errors->has('end') ? ' is-invalid' : '' }}" placeholder="{{ __('End') }}" value="{{ old('end') }}" autofocus>

                                    @if ($errors->has('end'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </fieldset>
                                <fieldset style="border:groove;padding:5px;">
                                <legend style="font-size:12px;">  &nbsp&nbsp&nbsp&nbsp Recurring event (set this values if event is recurring)</legend>
                                <div class="form-group{{ $errors->has('startRecur') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-startRecur">{{ __('Start Recurring') }}</label>
                                    <input type="date" name="startRecur" id="input-startRecur" class="form-control form-control-alternative{{ $errors->has('startRecur') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Recurring') }}" value="{{ old('startRecur') }}" autofocus>

                                    @if ($errors->has('startRecur'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('startRecur') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('endRecur') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-endRecur">{{ __('End Recurring') }}</label>
                                    <input type="date" name="endRecur" id="input-endRecur" class="form-control form-control-alternative{{ $errors->has('endRecur') ? ' is-invalid' : '' }}" placeholder="{{ __('End Recurring') }}" value="{{ old('endRecur') }}" autofocus>

                                    @if ($errors->has('endRecur'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('endRecur') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('daysOfWeek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-daysOfWeek">{{ __('Assignes to') }}</label>
                                    <select multiple size="7" name="daysOfWeek[]" id="input-daysOfWeek" class="form-control form-control-alternative{{ $errors->has('daysOfWeek') ? ' is-invalid' : '' }}" placeholder="{{ __('days Of Week') }}"   autofocus>
  
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>

                                    
                                    </select>
                                    @if ($errors->has('daysOfWeek'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('daysOfWeek') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </fieldset>
                            
                                <div class="form-group{{ $errors->has('assignesto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-assignesto">{{ __('Assignes to') }}</label>
                                    <select multiple size="3" name="assignesto[]" id="input-assignesto" class="form-control form-control-alternative{{ $errors->has('assignesto') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignes to') }}"  required autofocus>

                                    @foreach($assignees_array as $key)
                                     
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>

                                    @endforeach
                                    </select>
                                    @if ($errors->has('assignesto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('assignesto') }}</strong>
                                        </span>
                                    @endif
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
      listDay: { buttonText: 'Todays events' },
      listWeek: { buttonText: 'This week events' },
      listMonth: { buttonText: 'This month events' }
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
      text: 'Add Event',
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
  $('#eventTitle').html("Event :"+info.event.title+" Start :"+info.event.start+" End: "+info.event.end);
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