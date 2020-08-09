@extends('layouts.main')
@section('page_title', 'Create Doctor Profile')
@section('otherstyles')
 <!-- Select2 -->
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        Add new Doctor Profile
                        <div class="card-tools">
                        <a href="{{ route('doctor.index')}}" class="btn btn-sm btn-flat btn-outline-dark">
                            <i class="fas fa-users"></i>
                            All Doctors
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('doctor.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                    <select name="department_id" class="form-control select2 {{ $errors->has('department_id') ? 'is-invalid' : ''}}" id="department" style="width: 100%;">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $dept)
                                        <option value="{{ $dept->id}}"> {{ $dept->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <span class="text-danger">
                                            <small>
                                                {{ $message }}
                                            </small>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport</label>
                                        <div class="custom-file">
                                            <input type="file" name="doctor_image" class="custom-file-input {{ $errors->has('doctor_image') ? 'is-invalid' : ''}}" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose Passport file</label>
                                            @error('doctor_image')
                                                <span class="text-danger">
                                                    <small>
                                                        {{ $message }}
                                                    </small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : ''}}" placeholder="Enter Firstname">
                                        @error('firstname')
                                        <span class="text-danger">
                                            <small>
                                                 {{ $message }}
                                            </small>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : ''}}" placeholder="Enter Lastname">
                                        @error('lastname')
                                        <span class="text-danger">
                                            <small>
                                                 {{ $message }}
                                            </small>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" id="" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Enter a Valid Email Address">
                                        @error('email')
                                            <span class="text-danger">
                                                <small>
                                                    {{ $message }}
                                                </small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Enter Mobile Phone Number">
                                        @error('phone')
                                        <span class="text-danger">
                                            <small>
                                                {{ $message }}
                                            </small>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" placeholder="Enter Username">
                                    @error('username')
                                    <span class="text-danger"><small>
                                        {{ $message }}
                                        </small></span>

                                    @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}">
                                        @error('password')
                                        <span class="text-danger">
                                            <small>
                                                {{ $message }}
                                            </small>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                    <select name="gender" id="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : ''}}">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">
                                            <small>
                                                {{ $message }}
                                            </small>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="datetimepicker" name="dateofbirth" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('dateofbirth')
                                        <span class="text-danger">
                                            <small>
                                                {{ $message }}
                                            </small>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-flat btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
