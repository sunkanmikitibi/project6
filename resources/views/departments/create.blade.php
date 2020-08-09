@extends('layouts.main')
@section('page_title', 'New Department')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    Add Departments
                    <div class="card-tools">
                    <a href="{{ route('departments.index')}}" class="btn btn-outline-secondary btn-flat btn-sm">Add Department</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
