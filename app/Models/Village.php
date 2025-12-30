<?php

namespace App\Models;

use Eloquent;

class Village extends Eloquent
{
    public function ministry()
    {
       // return $this->hasMany(Tehsil::class);
    }
}
