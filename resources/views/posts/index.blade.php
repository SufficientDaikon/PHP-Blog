@extends('layouts.app')

@section('title')
    index
@endsection
@section('section')
    <div class="mt-3">
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="col-md-9">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at->format("Y-M-D") }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary mx-2">Edit</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post['id']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
