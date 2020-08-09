@extends('layouts.main')
@section('page_title', 'All Tickets')
@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-info">
            <div class="card-header">
                <i class="fas fa-ticket-alt"> </i>Tickets
            </div>

            <div class="card-body">
                @if ($tickets->isEmpty())
                    <p>There are currently no tickets.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                @foreach ($categories as $category)
                                    @if ($category->id === $ticket->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                        #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                    </a>
                                </td>
                                <td>
                                @if ($ticket->status === 'Open')
                                    <span class="badge badge-success">{{ $ticket->status }}</span>
                                @else
                                    <span class="badge badge-danger">{{ $ticket->status }}</span>
                                @endif
                                </td>
                                <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ url('ticketapp/tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
                                </td>
                                <td>
                                    <form action="{{ url('mainticket/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-danger">Close</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $tickets->render() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
