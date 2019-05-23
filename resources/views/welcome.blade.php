@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!--
php artisan tinker
factory(App\User::class, 1)->create()
-->

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
    @if(!isset(Auth::user()->email))
    <a href="{{ url('login') }}">Login</a>
    @endif
    @if(Auth::check() && Auth::user()->role == 'admin')
    <a href="{{ url('users') }}">Users</a>
    <a href="{{ url('questionnaires') }}">Questionnaires</a>
    @endif
    @if(Auth::check() && Auth::user()->role == 'user')
    <a href="{{ url('usersanswers') }}">Questionnaires</a>
    @endif
</div>

@endsection
