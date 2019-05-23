@extends('layouts.app')
@section('title', 'Create User')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create User
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
      <form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="password">Repeat password :</label>
              <input type="password" class="form-control" name="password_confirmation"/>
          </div>
          <div class="form-group">
              <label for="permissions">Permissions :</label>
              <select name="role">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
              </select>
          </div>
          <button type="submit" style="margin-bottom: 5px;" class="btn btn-primary">Create User</button>
          <div class="links">
            <a href="{{ url()->previous() }}">Back</a>
          </div>
      </form>
  </div>
</div>
@endsection