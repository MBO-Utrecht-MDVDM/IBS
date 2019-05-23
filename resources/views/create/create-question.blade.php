@extends('layouts.app')
@section('title', 'Create Question')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Question
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="POST" action="{{ route('questionnaires.questions.store', $questionnaire_id) }}">
          <div class="form-group">
              @csrf
              <label for="name">Question :</label>
              <input type="text" class="form-control" name="question"/>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Add Question</button>
          <div class="links">
            <a href="{{ url()->previous() }}">Back</a>
          </div>
      </form>
  </div>
</div>
@endsection