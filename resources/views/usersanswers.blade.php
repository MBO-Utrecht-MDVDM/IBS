@extends('layouts.app')
@section('title', 'Questionnaires')
@section('content')



@foreach ($questionnaires as $questionnaire)
<div class="card uper">
  <div class="card-header">
  {{ $questionnaire->title }}
</div>
<form method="post" action="{{ route('usersanswers.store', [$user_id = Auth::id()]) }}">
@csrf
@foreach ($questionnaire->questions as $question)

<h3>{{ $question->question }}</h3>

@foreach ($question->answers as $answer)
@if (($answer->type) === 'MC')
<div>
  <input type="radio" id="{{ $answer->id }}" name="{{ $question->id }}" value="{{ $answer->id }}">
  <label for="{{ $answer->text }}">{{ $answer->text }}</label>
</div>

@elseif (($answer->type) === 'IF')
<input type="text" id="{{ $answer->id }}" name="{{ $question->id }}" style="margin:10px;" placeholder="Input field"><br>

@endif

@endforeach

@endforeach

<button type="submit" value="submit" style="margin-top:10px; margin-bottom:10px;">Answer</button></form></div><br>

@endforeach

@endsection
