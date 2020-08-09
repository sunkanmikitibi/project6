@extends('layouts.main')
@section('content')
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        Choose Petition Category
                    </div>
                    <div class="card-body">
                    <form action="{{ route('petition.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                            <input type="text" value="{{ old('title')}}" name="title" id="" class="form-control form-control-sm {{ $errors->has('title') ? 'is-invalid' : ''}}">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="petition_image">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" name="petition_image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        <input type="hidden" name="petitioncategory_id" value="{{ $category['id'] }}">
                            <div class="form-group">
                                <label for="">Purpose</label>
                                <textarea name="purpose" id="summernote" class="form-control {{ $errors->has('purpose') ? 'is-invalid' : ''}}" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Submit Petition</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('otherscripts')
<script src="{{ asset('js/summernote-bs4.js') }}" defer></script>
<!-- Select2 -->
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  @endsection

