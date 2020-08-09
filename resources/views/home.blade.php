@extends('layouts.main')
@section('page_title', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

    <div class="row">
       <div class="col-md-6">
        <example-component></example-component>
       </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">Dashboard</div>

                <div class="card-body">




                    @if (Auth::user()->is_admin)
                        <a href="{{ url('mainticket/tickets') }}" class="btn btn-outline-primary btn-sm">All Tickets</a>
                    @else

                         <a href="{{ route('ticket.index') }}" class="btn btn-outline-primary btn-sm">My Tickets</a>
                          or
                         <a href="{{ url('ticketapp/new_ticket') }}" class="btn btn-outline-primary btn-sm">open new ticket</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Petitions</h4>
                    <div class="card-tools">
                    <a href="{{ route('petition.index')}}" class="btn btn-outline-dark btn-sm">Start a Petition</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @livewire('petition')
                </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="card card-info">
                <div class="card-header">Questionnaires
                    <div class="card-tools">
                        <a href="{{ route('questionnaire.create')}}" class="btn btn-outline-primary btn-sm">Create New Questionnaire</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($questionnaires as $questionnaire)
                            <li class="list-group-item">
                            <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a> <div class="float-right badge badge-primary">
                                {{$questionnaire->questions()->count()}}
                            </div>
                            <div class="mt-2">
                                <small class="font-wight-bolder">
                                    Share URL
                                </small>
                                <p>
                                <a href="{{ $questionnaire->publicPath() }}"> {{ $questionnaire->publicPath() }} </a>
                                </p>
                            </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @livewire('counter')

@endsection
