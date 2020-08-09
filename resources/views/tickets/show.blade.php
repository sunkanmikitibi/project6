@extends('layouts.main')
@section('page_title', $ticket->title)
@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-primary">
            <div class="card-header">
                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
            </div>
            <div class="card-body">
                @include('partials._messages')

                <div class="ticket-info">
                    <p>{{ $ticket->message }}</p>
                    <p>Categry: {{ $category->name }}</p>
                    <p>
                    @if ($ticket->status === 'Open')
                        Status: <span class="label label-success">{{ $ticket->status }}</span>
                    @else
                        Status: <span class="label label-danger">{{ $ticket->status }}</span>
                    @endif
                    </p>
                <p>Created: {{ $ticket->created_at->diffForHumans() }} by {{ $ticket->user->name }}</p>
                </div>

                <hr>

                <div class="comments">
                    @foreach ($ticket->comments as $comment)
                        <div class="card card-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                            <div class="card-header">
                                {{ $comment->user->name }} replied
                                <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="card-body">
                           
                              <img src="{{ asset('img/avatar5.png')}}" class="rounded-circle img-thumbnail" alt="{{$comment->user->name}}" style="width: 48px;"> &nbsp;
                             <small>{{ $comment->comment }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>

                <div class="comment-form">
                    <form action="{{ route('comment.store') }}" method="POST" class="form">
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
