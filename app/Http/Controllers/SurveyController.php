<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Answer;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
      //  dd($questionnaire);
      $questionnaire->load('questions.answers');
      return view('surveys.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {

        //dd(request()->all());

        $data = request()->validate(
            [
                'responses.*.answer_id' => 'required',
                'responses.*.question_id' => 'required',
                'survey.name' => 'required',
                'survey.email' => 'email | required',
            ]
            );

            $survey = $questionnaire->surveys()->create($data['survey']);
            $survey->responses()->createMany($data['responses']);

            return 'Thank you';

    }
}
