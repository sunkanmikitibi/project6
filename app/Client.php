<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded = [];


   public function appointments()
   {
       return $this->hasMany(Appointment::class);
   }
}
