@extends('layouts.main')
@section('page_title', 'Questionnaires')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                 <form action="{{route('questionnaire.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control form-control-sm" name="title" aria-describedby="titleHelp" placeholder="Enter Title" id="title">
                        <small class="form-text text-muted" id="titleHelp">Give your questionnaire a title that attracts attention.</small>
                        @error('title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <input type="text" name="purpose" aria-describedby="purposeHelp" class="form-control form-control-sm" placeholder="Enter Purpose" id="purpose">
                        <small class="form-text text-muted" id="purposeHelp">Giving a purpose will increase responses.</small>
                        @error('purpose')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-sm">Create Questionnaire</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
