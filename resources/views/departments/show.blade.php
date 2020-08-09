@extends('layouts.main')
@section('page_title', 'Show')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$department->name}}
                    </div>
                    <div class="card-body">
                        doctors of this category here
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                        <form action="{{ route('departments.destroy', $department->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-flat">Delete</button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
