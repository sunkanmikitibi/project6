<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;

class QuestionController extends Controller
{
    public function store(Questionnaire $questionnaire)
    {
        //dd(request()->all());
        $data = request()->validate(
            [
                'question.question'=>'required',
                'answers.*.answer'=>'required',
            ]
        );

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('questionsapp/questionnaire/'.$questionnaire->id);
    }

    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
