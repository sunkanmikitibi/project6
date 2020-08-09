@extends('layouts.main')
@section('page_title', 'Employee')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info"><div class="card-header">
                <h5 class="card-title">Employee Details</h5>
            <div class="card-tools"> <a href="{{ route('employee.index')}}" class="btn btn-xs btn-outline-dark">
                Back to Employees</a>  </div>
            </div>
                <div class="card-body">
                     <table class="table table-bordered table-striped">
                    <tr>
                        <td>Fullname</td>
                    <td>
                        {{ $employee->lastname }} {{ $employee->firstname }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                    <td> {{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                    <td> {{ $employee->phone }}</td>
                    </tr>
                </table>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-body bg-secondary">
            <form action="{{ route('employee.delete', $employee)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="alert('Are you Sure you want to Delete?')" class="btn btn-sm btn-outline-danger btn-block">
                        <i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
