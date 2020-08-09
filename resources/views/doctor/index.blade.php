@extends('layouts.main')
@section('page_title', 'All Doctors')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials._messages')
                <div class="card card-primary">
                    <div class="card-header">
                        Doctors
                        <div class="card-tools">
                        <a href="{{ route('doctor.create')}}" class="btn btn-flat btn-outline-dark btn-sm">
                            <i class="fas fa-user-plus"></i>
                           New Doctor</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-secondary">
                                    <th></th>
                                    <th>
                                       Firstname
                                    </th>
                                    <th>
                                        Surname
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>Department</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>
                                        <img src="{{ asset('imgs/doctors/'. $doctor->doctor_image)}}" class="img-responsive" style="width: 32px; border-radius: 20px;" alt="{{ $doctor->firstname }}" srcset="">
                                        </td>
                                        <td>
                                            {{$doctor->firstname}}
                                        </td>
                                        <td>
                                            {{$doctor->lastname}}
                                        </td>
                                        <td>
                                            {{$doctor->email}}
                                        </td>
                                        <td>
                                            {{ $doctor->phone }}
                                        </td>
                                        <td>
                                            {{ $doctor->department->name }}
                                        </td>
                                        <td>
                                        <a class="btn btn-xs btn-warning" href="{{ route('doctor.edit', $doctor->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        </td>
                                    </tr>
                                @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data</td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
