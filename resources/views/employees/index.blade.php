@extends('layouts.main')
@section('page_title', 'Employee')
@section('content')
    <div class="row">
        <div class="col-12">
            @include('partials._messages')
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">
                        All Employees  <div class="badge badge-danger">
                            {{$employees->count()}}
                    </h5>
                    <div class="card-tools"> <a href="{{ route('employee.create')}}" class="btn btn-xs btn-outline-dark">
                        <i class="fas fa-user-plus"></i>
                        Add Employee
                    </a> </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>
                                        {{ $employee->firstname}}
                                    </td>
                                    <td>{{ $employee->lastname}}</td>
                                    <td> {{ $employee->email}}</td>
                                    <td>{{ $employee->phone}}</td>
                                    <td>
                                        <a href="{{ route('employee.show', $employee)}}" class="btn btn-xs btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                         </a>
                                        <a href="{{ route('employee.edit', $employee)}}" class="btn btn-xs btn-outline-warning">
                                           <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align:center;">No Employee <a href="{{ route('employee.create')}}" class="btn btn-outline-info"> Add New </a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
