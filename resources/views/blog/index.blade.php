@extends('layout')

@section('content')
    <h2>Blog Posts</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogposts as $blogpost)
                <tr>
                    <td>{{ $blogpost->title }}</td>
                    <td>{{ $blogpost->content }}</td>
                    <td>
                        <a href="{{ route('blog.show', $blogpost->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('blog.edit', $blogpost->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('blog.destroy', $blogpost->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
