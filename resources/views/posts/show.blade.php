@extends('layouts.app')

@section('content')
    <a href="../posts" class="btn btn-outline-secondary mb-3">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:150px;height:150px" src="http://localhost/blogApp/public/storage/cover_images/{{$post->cover_image}}" alt="image">
    <div>
        {!!$post->body!!}
    </div>
    <hr class="mt-5">
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="d-flex">
                <a href="../posts/{{$post->id}}/edit" class="btn btn-outline-primary mr-3">Edit</a>

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                {!!Form::close()!!}
            </div>
        @endif
    @endif
@endsection