<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;
    
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
