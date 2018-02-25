@extends('layouts.admin')


@section('content')


<h1>Create Users</h1>

{!! Form::open(['method' => 'Post', 'action'=>'AdminUsersController@store', 'files'=>'true']) !!}

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
      {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control'])!!}
</div>



<div class="form-group"> 
      {!! Form::label('is_active', 'Status')!!}
      {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}
</div>

<div class="form-group"> 
      {!! Form::label('file', 'Upload Photo')!!}
      {!! Form::file('file', null, ['class'=>'form-control'])!!}
</div>



<div class="form-group"> 
      {!! Form::label('password', 'Password')!!}
      {!! Form::password('password', ['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit('Create User', ['class'=>'btn btn-primary'])!!}
</div>


{!! Form::close() !!}

@include('includes.formerror');

@stop