@extends('layouts.app')
@section('title', 'Users')
@section('content')
<div class="title m-b-md">
IBS
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        <?php $users = DB::table('users')->get();
        foreach ($users as $user){
        ?>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->role}}</td>
            <td><div class="links"><a href="{{ url('users/' . $user->id . '/edit')}}">Edit</a></div></td>
            <td> {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy',$user->id]]) !!}
                    <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                  {!! Form::close() !!}
            </td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="links">
        <a href="{{ url('users/create') }}">Create User</a>
    </div>
@endsection
