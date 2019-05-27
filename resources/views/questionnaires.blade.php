@extends('layouts.app')
@section('title', 'Questionnaires')
@section('content')
<div class="title m-b-md">
Questionnaire overview
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<!-- Makes a table row for each questionnaire consisting of a edit and remove button -->
        <?php $questionnaires = DB::table('questionnaires')->get();
        foreach ($questionnaires as $questionnaire){
        ?>
        <tr>
            <th scope="row">{{$questionnaire->id}}</th>
            <td><div class="links"><a>{{$questionnaire->title}}</a></div></td>
            <td><div class="links"><a href="{{ url('questionnaires/' . $questionnaire->id . '/questions')}}">View Questions</a></div></td>
            <td><div class="links"><a href="{{ url('questionnaires/' . $questionnaire->id . '/edit')}}">Edit Title</a></div></td>
            <td> 
              <form action="{{ route('questionnaires.destroy', [$questionnaire->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this questionnaire?')">
                </form>
            </td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="links">
        <a href="{{ url('questionnaires/create') }}">Create Questionnaire</a>
    </div>
@endsection
