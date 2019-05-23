<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id','text', 'type'];
    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function questionnaire()
    {
        return $this->question->questionnaire();
    }
}
