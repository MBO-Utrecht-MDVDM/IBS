@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!-- Welcoming page which has links to the login, questionnaire - edit and for the users. -->

<div class="title m-b-md">
IBS
</div>
<div class="top-right links">
    @if(isset(Auth::user()->email))
    <a>{{ Auth::user()->email }}</a>
    <a href="{{ url('login/logout') }}">Logout</a>
    @endif
</div>
<div class="links">
<!-- Checks if there's a user logged in, if not: asks the user to login. -->
    @if(!isset(Auth::user()->email))
    <a href="{{ url('login') }}">Login</a>
    @endif
<!-- Checks if there's an admin logged in, if there is: it shows the pages to edit users or questionnaires. -->
    @if(Auth::check() && Auth::user()->role == 'admin')
    <a href="{{ url('users') }}">Users</a>
    <a href="{{ url('questionnaires') }}">Questionnaires</a>
    @endif
<!-- Checks if there's a user logged in, if there is: it show the page to fill in a questionnaire. -->
    @if(Auth::check() && Auth::user()->role == 'user')
    <a href="{{ url('usersanswers') }}">Questionnaires</a>
    @endif
</div>

@endsection
