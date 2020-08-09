@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
            <h5 class="card-title">Client Details</h5>
            <div class="card-tools">
            <a href="{{ route('admin.clients')}}" class="btn btn-sm btn-outline-dark">Back to Clients</a>
            </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Fullname</td>
                        <td>{{$client->firstname}}  {{$client->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                    <td>{{ $client->email }}</td>
                    </tr>

                    <tr>
                        <td>Phone Number</td>
                    <td>{{ $client->phone }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Actions
                </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('clients.delete', $client)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="alert('Are you Sure you want to Delete?')" class="btn btn-sm btn-outline-danger"> <i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
