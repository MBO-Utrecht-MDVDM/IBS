<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($questionnaire_id, $question_id)
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            $answers = Answer::where('question_id', $question_id, $questionnaire_id)->get();
            return view('answers', compact('answers', 'question_id', 'questionnaire_id'));
        }
        return  redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $question_id, $questionnaire_id)
    {
        return view('create.create-answer', compact('question_id', 'questionnaire_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($question_id, $questionnaire_id, Request $request)
    {
        Answer::create($request->all() + ['question_id' => $question_id]);
        return redirect()->route('questionnaires.questions.answers.index', [$questionnaire_id, $question_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($questionnaire_id, $question_id, Answer $answer)
    {
        return view('edit.edit-answer', compact('questionnaire_id','question_id', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($questionnaire_id, $question_id, Request $request, Answer $answer)
    {
        $answer->update($request->all());
        return redirect()->route('questionnaires.questions.answers.index', [$questionnaire_id, $question_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($questionnaire_id, $question_id, Answer $answer)
    {
        $answer->delete();
        return redirect()->route('questionnaires.questions.answers.index', [$questionnaire_id, $question_id]);
    }
}
