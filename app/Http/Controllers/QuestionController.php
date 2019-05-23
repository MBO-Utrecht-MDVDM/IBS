<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($questionnaire_id)
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            $questions = Question::where('questionnaire_id', $questionnaire_id)->get();
            return view('questions', compact('questions', 'questionnaire_id'));
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($questionnaire_id)
    {
        return view('create.create-question', compact('questionnaire_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($questionnaire_id, Request $request)
    {
        Question::create($request->all() + ['questionnaire_id' => $questionnaire_id]);
        return redirect()->route('questionnaires.questions.index', $questionnaire_id);
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
    public function edit($questionnaire_id, Question $question)
    {
        return view('edit.edit-question', compact('questionnaire_id', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($questionnaire_id, Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('questionnaires.questions.index', $questionnaire_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($questionnaire_id, Question $question)
    {
        $question->delete();
        return redirect()->route('questionnaires.questions.index', $questionnaire_id);
    }
}
