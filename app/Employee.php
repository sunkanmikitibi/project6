<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];

   public function workinghours()
   {
       return $this->hasMany(Workinghour::class);
   }

   public function appointments()
   {
       return $this->hasMany(Appointment::class);
   }
}
