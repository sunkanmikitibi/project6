<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petitioncategory extends Model
{
    protected $guarded = [];

    public function petitions()
    {
        return $this->hasMany(Petition::class);
    }
}
