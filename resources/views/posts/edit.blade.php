@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
        @endif

    {!! Form::open(['method'=>'PATCH' , 'action'=>['PostsController@update' , $post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title','Post Title' ) !!}
        {!! Form::text('title' , $post->title , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Author Email' ) !!}
        {!! Form::text('email' , $post->email , ['class'=>'form-control' ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('checkbox','Active / De Active' ) !!}
        @if($post->status == 1)
            {!! Form::checkbox('status' , null , true ) !!}
        @else
            {!! Form::checkbox('status' , null , false ) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('description' , 'Description : ') !!}
        {!! Form::textarea('description' , $post->content, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit( 'Update' , ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
