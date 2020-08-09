<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    //turn off mass
    protected $guarded = [];

    public function path()
    {
        return  url('/questionsapp/questionnaire/'.$this->id) ;
    }

    public function publicPath()
    {
        return  url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function surveys()
    {
        return $this->hasMany('App\Survey');
    }


}
