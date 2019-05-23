@extends('layouts.app')
@section('title', 'Questions')
@section('content')
<div class="title m-b-md">
Questions from Questionnaire: {{$questionnaire_id}}
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Question</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        
        @foreach ($questions as $question)
        <tr>
            <th scope="row">{{$question->id}}</th>
            <td><div class="links"><a>{{$question->question}}</a></div></td>
            <td><div class="links"><a href="{{ route('questionnaires.questions.edit', [$question->questionnaire_id, $question->id]) }}">Edit</a></div></td>
            <td><div class="links"><a href="{{ route('questionnaires.questions.answers.index', [$question->questionnaire_id, $question->id])}}">View answers</a></div></td>
            <td>
                <form action="{{ route('questionnaires.questions.destroy', [$question->questionnaire_id, $question->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this question?')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="links">
    <a href="{{ url('questionnaires') }}">Back to Questionnaires</a>
    <a href="{{ route('questionnaires.questions.create', $questionnaire_id) }}">Create Question</a>
</div>
@endsection
