@extends('layouts.app')

@section('content')

    <h1>Posts List</h1>
    <a href="{{route('posts.create')}}" class="btn btn-info btn-sm float-right" style="font-family: Tahoma !important; color: #fff; margin-top: -30px">
        ایجاد پست جدید
    </a><br><br>


    <div class="col-md-12 justify-content-center">
        @foreach($posts as $post)

                <div class="card" style="width: 18rem; float: left;">
                    <a href="{{route('posts.show' , $post->id)}}">
                        <img src="{{$post->path}}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <h6>{{$post->user->email}}</h6>
                        <p class="card-text">{{$post->content}}</p>
                        <a href="{{route('posts.show' , $post->id)}}" class="btn btn-primary">View</a>
                    </div>
                </div>

        @endforeach
    </div>

@endsection
