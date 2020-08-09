@extends('layouts.main')
@section('page_title', 'Tickets')
@section('content')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card card-primary">
            <div class="card-header">
                <i class="fas fa-ticket-alt"></i> My Tickets
                <div class="card-tools">
                <a href="{{ route('ticket.create')}}" class="btn btn-outline-info btn-xs"> Create Ticket </a>
                </div>
            </div>

            <div class="card-body p-0">
                @if ($tickets->isEmpty())
                    <p>You have not created any tickets.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as $ticket)
                            <tr class="text-sm">
                                <td>
                                @foreach ($categories as $category)
                                    @if ($category->id === $ticket->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('ticket.show', $ticket->ticket_id) }}">
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
