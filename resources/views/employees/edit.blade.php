@extends('layouts.main')
@section('page_title', 'Employee')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">Create Employee</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('employee.update', $employee)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : ''}}" value="{{ old('firstname', $employee->firstname) }}">
                        @error('firstname')
                            <span class="text-danger">
                                <small>{{$message}}</small>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : ''}}" value="{{ old('lastname', $employee->lastname) }}">
                        @error('lastname')
                        <span class="text-danger">
                            <small>{{$message}}</small>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('email', $employee->email) }}">
                        @error('email')
                        <span class="text-danger">
                            <small>{{$message}}</small>
                        </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phonem Number</label>
                        <input type="text" name="phone" id="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" value="{{ old('phone', $employee->phone) }}">
                        @error('phone')
                        <span class="text-danger">
                            <small>{{$message}}</small>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button type="submit" class="btn btn-outline-info btn-md"> Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
