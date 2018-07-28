@extends('template')

@section('main')
<div class="container margin-top30">
  <div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-footer">
          <div class="panel">
            @include('common.sidenav')
          </div>
        </div>
    </div>
  </div>
  <div class="col-md-9 min-height-div">
    @if($previous_trips->count() == 0)
    <div class="panel panel-default">
      <div class="panel-heading">Previous Trips</div>
      <div class="panel-body">
        <p>You have no previous trips.</p>
      </div>
    </div>
    @endif
    @if($previous_trips->count() > 0)
    <div class="panel panel-default">
      <div class="panel-heading">Previous Trips</div>
      <div class="panel-body">
        <table class="table panel-body panel-light">
          <tbody>
            <tr>
              <th>Status</th>
              <th>Location</th>
              <th>Host</th>
              <th>Dates</th>
              <th>Options</th>
            </tr>
            @foreach($previous_trips as $previous_trip)
            <tr>
              <td>
                <span class="label label-orange label-{{ $previous_trip->label_color }}">
                  {{ $previous_trip->status }}
                </span>
                <br>
              </td>
              <td>
                <a href="{{ url('/') }}/properties/{{ @$previous_trip->property_id }}">{{ @$previous_trip->properties->name }}</a>
                <br>
                {{ @$previous_trip->properties->property_address->city }}
              </td>
              <td><a href="{{ url('/') }}/users/show/{{ @$previous_trip->host_id }}">{{ @$previous_trip->properties->users->full_name }}</a></td>
              <td>{{ @$previous_trip->dates }}</td>
              <td>
                <ul class="unstyled list-unstyled">
                  @if($previous_trip->status != "Cancelled" && $previous_trip->status != "Declined" && $previous_trip->status != "Expired")
                  <li>
                    <a href="{{ url('/') }}/booking/receipt?code={{ $previous_trip->code }}">View Receipt</a>
                  </li>
                  @endif
                </ul>
              </td>         
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
  
</div>
@stop