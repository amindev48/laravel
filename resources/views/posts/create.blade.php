@extends('layouts.app')


@section('content')

    <h1>Create Post</h1>
        @if(session()->has('messages'))
            <div class="alert alert-success">
                {{session()->get('messages')}}
            </div>
        @endif
    {!! Form::open(['method'=>'POST' , 'action'=>'PostsController@store' , 'files'=>true]) !!}
        <div class="form-group">

            {!! Form::label('title','Post Title' ) !!}
            {!! Form::text('title' , null , ['class'=>'form-control']) !!}

            @if($errors->has('title'))
                <p class="text-danger" style="font-family: Tahoma;">
                    {{$errors->first('title')}}
                </p>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email','Author Email' ) !!}
            {!! Form::text('email' , null , ['class'=>'form-control' ]) !!}
            @if($errors->has('email'))
                <p class="text-danger" style="font-family: Tahoma;">
                    {{$errors->first('email')}}
                </p>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('checkbox','Active / De Active' ) !!}
            {!! Form::checkbox('status' , null , false ) !!}

        </div>

    <div class="form-group">
        {!! Form::label('file','Default Image Post : ' ) !!}
        {!! Form::file('file' , ['class'=>'form-control' ]) !!}
        @if($errors->has('file'))
            <p class="text-danger" style="font-family: Tahoma;">
                {{$errors->first('file')}}
            </p>
        @endif
    </div>

        <div class="form-group">
           {!! Form::label('description' , 'Description : ') !!}
            {!! Form::textarea('description' , null, ['class'=>'form-control']) !!}
            @if($errors->has('description'))
                <p class="text-danger" style="font-family: Tahoma;">
                    {{$errors->first('description')}}
                </p>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit( 'Save' , ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection
