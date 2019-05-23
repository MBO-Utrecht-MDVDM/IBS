@extends('layouts.app')
@section('title', 'Create Questionnaire')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create Questionnaire
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
      <form method="post" action="{{ route('questionnaires.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Title :</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Create Questionnaire</button>
          <div class="links">
            <a href="{{ url()->previous() }}">Back</a>
          </div>
      </form>
  </div>
</div>
@endsection