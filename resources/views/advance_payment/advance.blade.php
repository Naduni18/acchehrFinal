@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">
                      
<form id="editEventForm" method="post"  autocomplete="off">
@csrf
<input type="number" name="eventId" id="input-eventId" >   
<button id="edit_btn"  type="button" onclick="editEvent(this.value)" name="edit" class="btn btn-primary">Edit event</button>
</form>
  
                    </div> 
                    </div>
                </div>
            </div>
        </div>
<script>
 
document.addEventListener('DOMContentLoaded', function() {
    $('#input-eventId').val(1);
    $('#edit_btn').val(1);
});
function editEvent(eventid){
  $( "#myModal" ).modal('hide');
//var response = \App\Http\Controllers\HomeController::getEvent(eventid) ;


alert("response");
}
</script>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush