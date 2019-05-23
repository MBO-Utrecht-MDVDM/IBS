@extends('layouts.app')
@section('title', 'Edit Answer')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Question
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br>
    @endif
      <form method="post" action="{{ route('questionnaires.questions.answers.update', [$answer->questionnaire->id, $answer->question_id, $answer->id]) }}">
        <div class="form-group">
          @csrf
          @method('PATCH')
            <label for="name">Text :</label>
            <input type="text" class="form-control" name="text" value="{{$answer->text}}"/>
        </div>
        <div class="form-group">
        <label for="permissions">Type :</label>
          <div>
            <input type="radio" id="MC" name="type" value="MC" checked>
            <label for="MC">Multiple choice</label>
        </div>
        <div>
          <input type="radio" id="IF" name="type" value="IF">
          <label for="IF">Input field</label>
        </div>
        <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Edit Question</button>
        <div class="links">
          <a href="{{ url()->previous() }}">Back</a>
        </div>
      </div>
    </form>
  </div>
</div>
<h2 style="color:red;">Please note that your answer will not appear if you don't have a type selected</h2><br>
@endsection