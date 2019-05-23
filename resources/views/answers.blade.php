@extends('layouts.app')
@section('title', 'Answers')
@section('content')
<div class="title m-b-md">
Answers
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Data</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        
        @foreach ($answers as $answer)
        <tr>
            <th scope="row">{{$answer->id}}</th>
            <td><div class="links"><a>{{$answer->type}}</a></div></td>
            <td><div class="links"><a>{{$answer->text}}</a></div></td>
            <td><div class="links"><a href="{{ route('questionnaires.questions.answers.edit', [$answer->questionnaire->id, $answer->question_id, $answer->id]) }}">Edit</a></div></td>
            <td>
                <form action="{{ route('questionnaires.questions.answers.destroy', [$answer->questionnaire->id, $answer->question_id, $answer->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this answer?')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="links">
    <a href="{{ route('questionnaires.questions.index', $questionnaire_id) }}">Back to questions</a>
    <a href="{{ route('questionnaires.questions.answers.create', [$questionnaire_id, $question_id]) }}">Add Answer</a>
</div>
@endsection
