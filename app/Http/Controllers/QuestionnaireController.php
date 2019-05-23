<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use Auth;

class QuestionnaireController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            return view('questionnaires');
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            return view('create.create-questionnaire');
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            $validatedData = $request->validate([
            'title' => 'required',
        ]);
            $questionnaire = Questionnaire::create($validatedData);
            return view('questionnaires');
        }
        return redirect('/');
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
    public function edit($id)
    {if (Auth::check() && Auth::user()->role == 'admin')
        {
        
            $questionnaire = Questionnaire::findOrFail($id);
            return view('edit.edit-questionnaire', compact('questionnaire'));
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            $validatedData = $request->validate([
                'title' => 'required',
            ]); 
            Questionnaire::whereId($id)->update($validatedData);
            return redirect('/questionnaires');
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role == 'admin')
        {
            $questionnaire = Questionnaire::findOrFail($id);
            $questionnaire->delete();
            return redirect('/questionnaires');
        }
        return redirect('/');
    }
}
