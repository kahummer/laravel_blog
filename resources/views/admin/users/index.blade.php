@extends('layouts.admin')


@section('content')

@if(Session::has('deleted user'))
   

<div class="alert alert-danger"> {{Session('deleted user')}}</div>


  @endif


<h1>Users</h1>

 <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photos</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    @if($users)

        @foreach($users as $user)
    <tbody>
      <tr>
        <td>{{$user->id}}</td>
        <td>  <img height<img src="{{$user->photo ? $user->photo->file:'http://placeholder.it/400x400'}}" height="50"  
    alt="" class="img-responive img-rounded"></td>
        <td><a href="{{route('users.edit', $user->id)}}"> {{$user->name}} </a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
        @endforeach
      
    @endif
    </tbody>
   
  </table>




@stop