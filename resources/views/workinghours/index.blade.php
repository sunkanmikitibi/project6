@extends('layouts.main')
@section('page_title', 'Working Hours')
@section('otherstyles')
<link rel="stylesheet" href="{{ asset('cal/main.css')}}">
<script src='{{ asset('cal/main.js')}}'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true,
      nowIndicator: true,
        events: [
            @foreach($workinghours as $workin)
          {
            title: '{{ $workin->employee->firstname.' '.$workin->employee->lastname }}',
            start: '{{ date('Y-m-d H:i:s', strtotime($workin->start_time))  }}',
            end: '{{ date('Y-m-d H:i:s', strtotime($workin->end_time )) }}',
          },
          @endforeach

        ]
      });

      calendar.render();
    });

  </script>
<style>

#calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
@endsection
@section('content')
    <div class="row">

                 <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">Working Hours</h5>
                    <div class="card-tools">
                    <a href="{{ route('workinghours.create')}}"
                    class="btn btn-xs btn-outline-dark">
                    <i class="fas fa-hourglass"></i> &nbsp;
                    Add Working Hours</a> </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($workinghours as $workin)
                               <tr>
                               <td>{{ $workin->employee->firstname .' '. $workin->employee->lastname }}</td>
                               <td>{{ date('D, d M, Y', strtotime($workin->appointment_date)) }}</td>
                               <td>{{ date('h:i a', strtotime($workin->start_time)) }}</td>
                                   <td> {{ date('h:i a', strtotime($workin->end_time)) }}</td>
                                   <td><a href="#" class="btn btn-xs btn-outline-warning">
                                       <i class="far fa-edit"></i></a></td>
                               </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-body">
                    <div id='calendar-container'>
                <div id='calendar'></div>
              </div>
                </div>
            </div>

        </div>
    </div>
@endsection
