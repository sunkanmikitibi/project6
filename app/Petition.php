<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Petitioncategory::class);
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class)->orderby('created_at', 'desc');
    }
}
