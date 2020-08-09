@extends('layouts.main')
@section('page_title', 'Open Ticket')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card card-primary">
                <div class="card-header">Open New Ticket
                <div class="card-tools">
                    <a href="{{ route('ticket.index')}}" class="btn btn-outline-info btn-xs"> List Tickets</a></div>
                </div>

                <div class="card-body">
                    @include('partials._messages')
                    <form role="form" method="POST" action="{{ route('ticket.store') }}">
                        @csrf
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="help-block">
                                        <strong> {{ $message}}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="control-label">Category</label>


                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                     <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="ontrol-label">Priority</label>
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>

                                @error('priority')
                                     <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="control-label">Message</label>

                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">

                                <button type="submit" class="btn btn-flat btn-outline-primary">
                                    <i class="fas fa-ticket"></i> Open Ticket
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
