@extends('layouts.app')

@section('content')

    <h1 class="h1">
        <a href="{{route('posts.edit' , $post->id)}}">
            {{$post->title}}
        </a>
    </h1>
    <button class="btn btn-danger btn-sm" id="delete" onclick="if (confirm('Are you sure ?')){
              document.getElementById('form_delete').submit();
            }">
        Delete Post
    </button><br><br>

    <form id="form_delete" action="{{route('posts.destroy' , $post->id)}}" method="post">
        @csrf
        {{method_field('DELETE')}}
    </form>



    <span style="font-weight: bold">Post Title : {{$post->title}}</span>
    <p style="font-weight: bold">Post Description : {{$post->content}}</p>
    <span style="font-weight: bold">Author Email : {{$post->email}}</span><br><br>
    <span style="font-weight: bold">Post Status :
        @if($post->status == '1')
            Active
        @else
            De Active
        @endif
    </span>
@endsection
