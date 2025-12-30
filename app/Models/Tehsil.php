<?php

namespace App\Models;

use Eloquent;

class Tehsil extends Eloquent
{
    public function ministry()
    {
       // return $this->hasMany(District::class);
    }
}
