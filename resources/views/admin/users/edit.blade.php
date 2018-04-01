@extends('layouts.admin')


@section('content')


<h1>Edit User</h1>
<div class="row">
<div class="col-sm-3 push-left">
	
	<img src="{{$user->photo ? $user->photo->file:'http://placeholder.it/400x400'}}" height="180" width="180" 
	alt="" class="img-responive img-rounded">

</div>


<div class="col-sm-3">
{!! Form::model($user, ['method' => 'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true']) !!}

<div class="form-group"> 
      {!! Form::label('name', 'Name')!!}
      {!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group"> 
      {!! Form::label('email', 'Email')!!}
      {!! Form::email('email', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group"> 
      {!! Form::label('role_id', 'Role_Id')!!}
      {!! Form::select('role_id', $roles, null, ['class'=>'form-control'])!!}
</div>



<div class="form-group"> 
      {!! Form::label('is_active', 'Status')!!}
      {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
</div>

<div class="form-group"> 
      {!! Form::label('photo_id', 'Upload Photo')!!}
      {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
</div>



<div class="form-group"> 
      {!! Form::label('password', 'Password')!!}
      {!! Form::password('password', ['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6'])!!}
</div>


{!! Form::close() !!}

{!! Form::open(['method' => 'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'class'=> 'pull-right']) !!}

<div class="form-group">

{!!Form::submit('Delete User', ['class'=>'btn btn-danger'])!!}



{!! Form::close() !!}


</div>
</div>
<div class="row">

@include('includes.formerror');

</div>



@stop