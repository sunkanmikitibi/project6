<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse');
    }
}
