@extends('layouts.admin')



@section('content')

<h1>Posts</h1>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo_id</th>
        <th>Owner</th>
        <th>Category_id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)

    	  @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
    <td><img height = "100px" src= "{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id ? $post->category->name: 'Uncategorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
      </tr>
          @endforeach
        @endif  
    </tbody>
  </table>

@stop




