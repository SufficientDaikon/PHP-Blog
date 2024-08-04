@extends('layouts.app')

@section('title')
    create
@endsection

@section('section')

    @if ($errors->any())
    <div class=" d-flex mt-4 justify-content-center">
        <div class="alert alert-danger col-md-8">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
        
    @endif
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class=" d-flex justify-content-center">
            <div class="col-md-8 justify-content-center">
                <div class="mb-3 ">
                    <label for="exampleFormControlInput1" class="form-label">title</label>
                    <input name="title" type="text" class="form-control" value="{{old("title")}}" id="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old("description")}}</textarea>
                </div>
                <select name="post_creator" class="form-select" aria-label="Default select example">
                    @foreach ($users as $user)
                        <option value="1">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </form>
@endsection
