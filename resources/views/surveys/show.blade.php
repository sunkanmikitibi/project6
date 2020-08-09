@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

        <form action="/surveys/{{$questionnaire->id}} - {{ Str::slug($questionnaire->title)}}" method="post">
                @csrf
                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><div class="card-title">(<strong>{{ $key + 1}}</strong>) {{$question->question}}</div></div>

                        <div class="card-body">
                                @error('responses.'. $key .'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <ul class="list-group">
                                    @foreach ($question->answers as $answer)
                                    <label for="answer{{ $answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio"
                                            {{ (old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : '' }}
                                            name="responses[{{$key}}][answer_id]"
                                        class="mr-2" value="{{$answer->id}}" id="answer{{ $answer->id}}">
                                        {{$answer->answer}}
                                        </li>
                                    <input type="hidden" name="responses[{{$key}}][question_id]" value="{{ $question->id}}">
                                    </label>

                                    @endforeach
                                </ul>

                            </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Your Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" name="survey[name]" id="name" placeholder="Enter Your Name Please !!!"
                            class="form-control form-control-sm">
                            <small class="text-muted form-text" id="nameHelp">Hello! What is your name?</small>

                        </div>

                        <div class="form-group">
                            <label for="name">Your Email:</label>
                            <input type="email" name="survey[email]" id="" placeholder="Enter Email here !!!"
                            class="form-control form-control-sm">
                            <small class="text-muted form-text">Your Email Please</small>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-md btn-primary">Add your Response</button>
                </div>
            </form>



        </div>
    </div>
</div>
@endsection
