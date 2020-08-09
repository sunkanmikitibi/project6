@extends('layouts.main')
@section('page_title', 'All Department')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card card-dark">
                <div class="card-header">
                    Departments
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                            <tr>
                                <td>
                                <a href="{{ route('departments.show', $department->id)}}">
                                    {{$department->name}}</a>
                                    </td>
                            <td>
                                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-flat btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>  <a href="{{ route('departments.destroy', $department->id)}}" class="btn btn-flat btn-sm btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a> </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">
                                    No Department
                                </td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    Add Department
                </div>
                <div class="card-body">
                <form action="{{ route('departments.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Department Name</label>
                            <input type="text" name="name"
                        class="form-control form-control-sm" id="">
                        @error('name')
                            <small class="text-danger">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-flat btn-sm btn-outline-primary">
                                Add Department
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
