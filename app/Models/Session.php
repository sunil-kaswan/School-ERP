<?php

namespace App\Models;

use App\User;
use Eloquent;

class Session extends Eloquent
{
    protected $fillable = ['name','is_current_session'];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current_session', 1);
    }
}
