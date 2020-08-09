@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
            <div class="card-header">Create New Question</div>
                <div class="card-body">
                    <form action="{{route('questions.store', $questionnaire->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control form-control-md" name="question[question]"
                        aria-describedby="titleHelp" value="{{ old('question.question')}}" placeholder="Enter Question" id="title">
                            <small class="form-text text-muted" id="questionHelp">Ask simple and to-the point questions for the best results.</small>
                            @error('question.question')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>Choices</legend>
                                    <small class="form-text text-muted" id="choicesHelp">
                                        Give Choices that gives the most insight into your question.
                                    </small>
                                    <div>
                                        <div class="form-group">
                                            <label for="answer1">Choice 1:</label>
                                            <input type="text" name="answers[][answer]" aria-describedby="choicesHelp"
                                            class="form-control form-control-sm"
                                            value="{{ old('answers.0.answer')}}"
                                             placeholder="Enter Choice 1" id="answer1">

                                            @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer2">Choice 2:</label>
                                            <input type="text" name="answers[][answer]"  value="{{ old('answers.1.answer')}}"
                                            aria-describedby="choicesHelp"
                                            class="form-control form-control-sm" placeholder="Enter Choice 2" id="answer2">

                                            @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer3">Choice 3:</label>
                                            <input type="text" name="answers[][answer]" value="{{ old('answers.2.answer')}}" aria-describedby="choicesHelp"
                                            class="form-control form-control-sm" placeholder="Enter Choice 3" id="answer3">

                                            @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer4">Choice 4:</label>
                                            <input type="text" name="answers[][answer]"  value="{{ old('answers.3.answer')}}" aria-describedby="choicesHelp"
                                            class="form-control form-control-sm" placeholder="Enter Choice 4" id="answer4">

                                            @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        <button type="submit" class="btn btn-outline-dark">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
