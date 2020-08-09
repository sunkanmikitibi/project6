@extends('layouts.main')
@section('page_title', 'Edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit
                    </div>
                    <div class="card-body">
                    <form action="{{ route('departments.update', $department->id)}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="">Department Name</label>
                              <input type="text" name="name"
                              class="form-control form-control-sm" value="{{ $department->name }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-flat btn-outline-warning">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
