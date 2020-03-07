@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body">
                      
                     
                      <table class="table" style="height: 200px">
  <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Employee ID</th>
    <th scope="col">Approved by</th>
    <th scope="col">Amount</th>
    <th scope="col">Notes</th>
    <th scope="col">Status</th>
    <th scope="col">For Year</th>
    <th scope="col">For Month</th>
    </tr>
    </thead>
  <tbody>
    
      @foreach($advance_req as $record)
      <tr>
      <td>  {{$record->id}} </td>
      <td>  {{$record->emp_id}} </td>
      <td>  {{$record->approved_by}} </td>
      <td>  {{$record->amount}} </td>
      <td>  {{$record->notes}} </td>
      <td>  {{$record->status}} </td>
      <td>  {{$record->for_year}} </td>
      <td>  {{$record->for_month}} </td>
      <td class="text-right">
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                        
                <form action="" method="post">
                    @csrf
                    <a class="dropdown-item" data-id="{{$record->id}}" href="#">{{ __('Edit') }}</a>
                    <a class="dropdown-item" id="delete_btn"  href="{{ route('advance_requests_ajax_crud.destroy', $record->id) }}">{{ __('Delete') }}</a>
                </form>    
            </div>
        </div>
       </td>
      </tr>
      @endforeach
    
  </tbody>
</table>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
<script>
 $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//delete user login
$(#delete_btn).onclick( function () {
    alert("start");
     
  });

});
</script>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush