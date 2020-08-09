@extends('layouts.main')
@section('otherstyles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css')}}">

@endsection
@section('page_title', 'Create Appointments')
@section('content')
    <div class="row">
        <div class="col-md-12">


                    <div class="card card-primary">
                        <div class="card-header">
                            New Appointment
                            <div class="card-tools">
                            <a href="{{ route('appointments.index')}}" class="btn btn-xs btn-outline-dark">
                               <i class="fas fa-calendar-alt"></i> All Appointments</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 offset-2">
                        <form action="{{ route('appointments.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="Clients">Clients</label>
                            <select name="client_id" class="form-control select2 {{ $errors->has('client_id') ? 'is-invalid' : ''}}" id="">
                                    <option value="" selected>Select Client</option>
                                    @foreach ($clients as $client)
                                <option value="{{ $client->id }}"> {{ $client->lastname .' '. $client->firstname }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <span class="text-danger"><small>
                                    {{ $message}}
                                    </small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Clients">Employee</label>
                                <select name="employee_id" class="form-control select2" id="">
                                    <option value="" selected>Select Employee</option>
                                    @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"> {{ $employee->lastname .' '. $employee->firstname }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <span class="text-danger"><small>
                                {{ $message}}
                                </small></span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Start Time:</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="text" value="{{ old('start_time') }}" name="start_time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                  <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                  </div>
                                  </div>
                                  @error('start_time')
                                  <span class="text-danger"><small>
                                  {{ $message}}
                                  </small></span>
                              @enderror
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Finish Time:</label>

                                <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                  <input type="text" name="finish_time" class="form-control datetimepicker-input" data-target="#timepicker2"/>
                                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                  </div>
                                  </div>
                                <!-- /.input group -->
                              </div>

                              <div class="form-group">
                                  <label for="comments">Comments</label>
                                  <textarea name="comments" class="form-control" id="" cols="30" rows="10"></textarea>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-outline-primary">Add New Appointment</button>
                              </div>
                        </form>
                    </div>
                    </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
