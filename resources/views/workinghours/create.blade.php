@extends('layouts.main')
@section('otherstyles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css')}}">

@endsection
@section('page_title', 'Working Hours')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">Working Hours</h5>
                    <div class="card-tools">
                    <a href="{{ route('workinghours.index')}}"
                    class="btn btn-xs btn-outline-dark">
                    <i class="fas fa-hourglass"></i> &nbsp;
                    Working Hours</a> </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 offset-2">
                        <form action="{{ route('workinghours.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Employee</label>
                            <select class="form-control select2" name="employee_id">
                                <option value="" selected="selected">Select Employee</option>
                               @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{$employee->lastname}} {{ $employee->firstname }}</option>
                               @endforeach


                              </select>
                        </div>

                        <div class="form-group">
                            <label>Appointment Date:</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="appointment_date" data-target="#reservationdate"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                            <label>Start Time:</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                              <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fas fa-clock"></i></div>
                              </div>
                              </div>
                            <!-- /.input group -->
                          </div>

                          <div class="form-group">
                            <label>End Time:</label>

                            <div class="input-group date" id="timepicker2" data-target-input="nearest">
                              <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#timepicker2"/>
                              <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fas fa-clock"></i></div>
                              </div>
                              </div>
                            <!-- /.input group -->
                          </div>

                          <div class="form-group">
                              <button type="submit" class="btn btn-outline-primary btn-md">Add Working Hours</button>
                          </div>

                    </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

