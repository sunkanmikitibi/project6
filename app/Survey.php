<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionaire');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse');
    }
}
