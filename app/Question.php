<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['questionnaire_id', 'question'];
    public $timestamps = false;

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
