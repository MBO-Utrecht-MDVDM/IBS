<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAnswers extends Model
{
    protected $fillable = ['user_id', 'answer_id', 'text'];
    public $timestamps = false;

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
