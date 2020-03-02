@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Dashboard
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary nav-item nav-link col-md-8 mx-auto" href="http://localhost/blogApp/public/posts/create">Create Post</a>
                    <h3 class="mt-3">Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post) 
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="http://localhost/blogApp/public/posts/{{$post->id}}/edit" class="btn btn-outline-primary mr-3">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="alert alert-primary">
                            You don't have any posts yet. Feel free to add some!
                        </div>
                    @endif
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
