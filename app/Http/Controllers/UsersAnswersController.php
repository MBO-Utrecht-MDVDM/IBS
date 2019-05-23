<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\UsersAnswers;


class UsersAnswersController extends Controller
{
    public function index(){
        $questionnaires = Questionnaire::all();
        return view('usersanswers', compact('questionnaires'));
    }

    public function store($user_id, Request $request)
    {
        \Log::info($request->all());
        $newAnswer = new UsersAnswers();
        $newAnswer->user_id = $user_id;
        $newAnswer->answer_id = $request->all()[1];
        $newAnswer->save();
        // UsersAnswers::create($request->all() + ['user_id' => $user_id]);
        return redirect('/');
    }
}
