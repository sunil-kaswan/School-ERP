<?php

namespace App\Models;

use App\Models\Session;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Eloquent;

class ManageStaff extends Eloquent
{
    use HasFactory, Notifiable;
    protected $table = 'manage_staffs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'session_id', 'user_id', 'date_of_joining', 'relieving_date', 'salary', 'id_adhar', 'designation','qualifications','previous_salary_increment','experience'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

}
