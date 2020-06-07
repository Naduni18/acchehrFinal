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
       <h3 id="eventTitle"></h3>
       
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
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}"  autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                
                                <fieldset name="recur_" style="border:groove;padding:5px;">
                                <legend style="font-size:12px;">  &nbsp&nbsp&nbsp&nbsp Non-recurring event (set this values only for a non recurring event)</legend>
                                <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-start">{{ __('Start') }}</label>
                                    <input type="datetime-local" name="start" id="input-start" class="form-control form-control-alternative{{ $errors->has('start') ? ' is-invalid' : '' }}" placeholder="{{ __('Start') }}" value="{{ old('start') }}" autofocus>

                                    
                                </div>
                                <div class="form-group{{ $errors->has('end') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-end">{{ __('End') }}</label>
                                    <input type="datetime-local" name="end" id="input-end" class="form-control form-control-alternative{{ $errors->has('end') ? ' is-invalid' : '' }}" placeholder="{{ __('End') }}" value="{{ old('end') }}" autofocus>

                                    
                                </div>
                                </fieldset>
                                <fieldset name="nonrecur_" style="border:groove;padding:5px;">
                                <div class="form-group{{ $errors->has('startTime') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-startTime">{{ __('Start Time') }}</label>
                                    <input type="time" name="startTime" id="input-startTime" class="form-control form-control-alternative{{ $errors->has('startTime') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Time') }}" value="{{ old('startTime') }}" autofocus>

                                    
                                </div>
                                <div class="form-group{{ $errors->has('endTime') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-endTime">{{ __('End Time') }}</label>
                                    <input type="time" name="endTime" id="input-endTime" class="form-control form-control-alternative{{ $errors->has('endTime') ? ' is-invalid' : '' }}" placeholder="{{ __('End Time') }}" value="{{ old('endTime') }}" autofocus>

                                </div>
                                <legend style="font-size:12px;">  &nbsp&nbsp&nbsp&nbsp Recurring event (set this values only if event is recurring)</legend>
                                <div class="form-group{{ $errors->has('startRecur') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-startRecur">{{ __('Start Recurring') }}</label>
                                    <input type="date" name="startRecur" id="input-startRecur" class="form-control form-control-alternative{{ $errors->has('startRecur') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Recurring') }}" value="{{ old('startRecur') }}" autofocus>

                                    
                                </div>
                                <div class="form-group{{ $errors->has('endRecur') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-endRecur">{{ __('End Recurring') }}</label>
                                    <input type="date" name="endRecur" id="input-endRecur" class="form-control form-control-alternative{{ $errors->has('endRecur') ? ' is-invalid' : '' }}" placeholder="{{ __('End Recurring') }}" value="{{ old('endRecur') }}" autofocus>

                                    
                                </div>
                                <div class="form-group{{ $errors->has('daysOfWeek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-daysOfWeek">{{ __('Days') }}</label>
                                    <select multiple size="7" name="daysOfWeek[]" id="input-daysOfWeek" class="form-control form-control-alternative{{ $errors->has('daysOfWeek') ? ' is-invalid' : '' }}" placeholder="{{ __('days Of Week') }}"   autofocus>
  
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>

                                    
                                    </select>
                                   
                                </div>
                                </fieldset>
                            
                                <div class="form-group{{ $errors->has('assignesto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-assignesto">{{ __('Assignes to') }}</label>
                                    <select multiple size="3" name="assignesto[]" id="input-assignesto" class="form-control form-control-alternative{{ $errors->has('assignesto') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignes to') }}"  autofocus>

                                    @foreach($assignees_array as $key)
                                     
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>

                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-location">{{ __('location') }}</label>
                                    <input type="text" name="location" id="input-location" class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ __('location') }}" value="{{ old('location') }}"  autofocus>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-notes">{{ __('notes') }}</label>
                                    <input type="text" name="notes" id="input-notes" class="form-control form-control-alternative{{ $errors->has('notes') ? ' is-invalid' : '' }}" placeholder="{{ __('notes') }}" value="{{ old('notes') }}" autofocus>

                                    @if ($errors->has('notes'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notes') }}</strong>
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
  var this_year = new Date().getFullYear().toString();
  var next_year = (new Date().getFullYear()+1).toString();
  var last_year = (new Date().getFullYear()-1).toString();
  var next_next_year = (new Date().getFullYear()+2).toString();
  
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          googleCalendarApiKey: 'AIzaSyDTUBG88AAWMD3BOy-AwcgdeVqq3GpYDDk',
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
id:'assigned_by_user',
color: '#32b67a',//green
},
{
events:{!! $ce2 !!},
id:'assigned_to_user',
color: '#9e69af',//purple
},
{
events:{!! $ce3 !!},
id:'no_assignees',
color: '#f06b02',//orange
},
{
events:[
    {
      title: 'Year end vacation', 
      start: this_year+'-12-18', 
      end: next_year+'-01-01',
      rendering: 'background'
    },
    {
      title: 'Year end vacation', 
      start: last_year+'-12-18', 
      end: this_year+'-01-01',
      rendering: 'background' 
    },
    {
      title: 'Year end vacation', 
      start: next_year+'-12-18', 
      end: next_next_year+'-01-01',
      rendering: 'background' 
    }
  ],
id:'vacation',
color: '#35baf6',//light blue
},
{ 
googleCalendarId: 'en.lk#holiday@group.v.calendar.google.com',
id:'google',
color: '#f7c027',//yellow
}
],
customButtons: {
@can('isManager')
    addEventButton: {
      text: 'Add Event',
      click: function() {
        $( "#addEventModel" ).modal('toggle');
      }
    }
@endcan
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
  $('#eventTitle').html("Event :"+info.event.title+" </br>Start :"+info.event.start+" </br>End: "+info.event.end);
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