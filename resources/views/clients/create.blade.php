@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        Create Client
                    </h5>
                </div>
                <div class="card-body">
                <form action="{{ route('clients.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" value="{{ old('firstname')}}" id="firstname" class="form-control">
                        @error('firstname')
                            <span class="text-danger">
                            <small>{{ $message }}</small>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" value="{{ old('lastname')}}" id="lastname" class="form-control">
                        @error('lastname')
                            <span class="text-danger">
                            <small>{{ $message }}</small>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="lastname">Email Address</label>
                        <input type="email" name="email" value="{{ old('email')}}" id="email" class="form-control">
                        @error('email')
                            <span class="text-danger">
                            <small>{{ $message }}</small>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone')}}" id="phone" class="form-control">
                        @error('phone')
                            <span class="text-danger">
                            <small>{{ $message }}</small>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-outline-info">Add Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
