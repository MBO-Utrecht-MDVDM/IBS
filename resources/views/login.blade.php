@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="title m-b-md">
IBS
</div>

<!-- Checks if the password is the same in the database -->

<div class="row">
    <form method="post" action="{{ url('login/checklogin') }}">
        {{ csrf_field() }}
        <input style="margin-bottom: 10px;" class="col-6" type="text" placeholder="E-mail" name="email">
        <input style="margin-bottom: 40px;" class="col-6" type="password" placeholder="Password" name="password">
        @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>Credentials error
            </ul>
        </div>
    @endif
    <br>
        <input type="submit" class="btn btn-primary" name="login" value="Login">
    </form>
</div>


@endsection
