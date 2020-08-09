@extends('layouts.main')
@section('page_title', 'Appointments')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials._messages')
            <div class="card card-primary">
                <div class="card-header">
                    All Appointments
                    <div class="card-tools">
                    <a href="{{ route('appointments.create')}}" class="btn btn-sm btn-outline-dark">
                       <i class="fas fa-calendar-alt"></i> Add Appointments</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Employee</th>
                                <th>Start Time</th>
                                <th>Finish Time</th>
                                <th>Comments</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td>
                                        {{$appointment->client->firstname .' '. $appointment->client->lastname }}
                                    </td>
                                    <td>
                                        {{$appointment->employee->firstname .' '. $appointment->employee->lastname }}
                                    </td>
                                    <td>
                                        {{ date('D, d M Y H:i a', strtotime($appointment->start_time)) }}
                                    </td>
                                    <td>
                                        {{ date('D, d M Y H:i a', strtotime($appointment->finish_time)) }}
                                    </td>
                                    <td>
                                        {{ $appointment->comments }}
                                    </td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Appointments</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
