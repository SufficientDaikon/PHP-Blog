@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('section')
    
<div class="d-flex justify-content-center">
        <div class="card col-md-8 text-center">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post['title'] }}</h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <div class="card col-md-8 text-center">
            <div class="card-header">
                Post Creater Info
            </div>
            <div class="card-body">
                <h5 class="card-title"> {{$post->user->name}}</h5>
                <p class="card-text"> {{$post->user->email}} </p>
            </div>
            <div class="card-footer text-body-secondary">
                {{$post->created_at }}
            </div>
        </div>
    </div>
@endsection

    
