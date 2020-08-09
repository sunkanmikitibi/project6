@extends('layouts.main')
@section('page_title', 'Questionaires')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                 <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">

                <a class="btn btn-md btn-outline-primary" href="{{ route('questions.create', $questionnaire->id) }}">
                    Add New Question
                </a>
            <a class="btn btn-md btn-outline-primary" href="/surveys/{{ $questionnaire->id }} - {{ Str::slug($questionnaire->title) }}">
                    Take Survey
                </a>
                </div>
            </div>

            @foreach ($questionnaire->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ $question->question }}</div>

               <div class="card-body">
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                            <li class="list-group-item">
                                {{$answer->answer}}

                            <div class="badge badge-success float-right">

                                {{ ($answer->responses->count() * 100 ) / $question->responses->count() }} %
                            </div>
                            </li>
                        @endforeach
                    </ul>
               </div>

               <div class="card-footer">
               <form action="/questionnaires/{{$questionnaire->id}}/questions/{{ $question->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete Question</button>
                </form>
               </div>
           </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
