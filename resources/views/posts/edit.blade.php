@extends('layouts.app')

@section('title')
    edit
@endsection

@section('section')
    <form method="POST" action="{{route('posts.update', $post->id)}}">
        @csrf
        @method("PUT")
        <div class=" d-flex justify-content-center">
            <div class="col-md-8 justify-content-center">
                <div class="mb-3 ">
                    <label for="exampleFormControlInput1" class="form-label">title</label>
                    <input value="{{$post->title}}" name="title" type="text" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">description</label>
                    <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
                </div>
                <select name="post_creator" class="form-select" aria-label="Default select example">
                    @foreach ($users as $user)
                    <option @if($user->id == $post->user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>

            </div>
        </div>
    </form>
@endsection
