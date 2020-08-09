<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class QuestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $questionnaires = Questionnaire::all();
        return view('questionnaire.create', compact('questionnaires'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

       /* $data['user_id'] = auth()->user()->id;
        $questionnaire = Questionnaire::create($data);
            */
        $questionnaire = auth()->user()->questionnaires()->create($data);
        return redirect('/questionnaire/'.$questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');
        //dd($questionnaire);
        return view('questionnaire.show', compact('questionnaire'));
    }
}
