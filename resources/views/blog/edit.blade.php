@extends('layout')

@section('content')
<style> 
    .container2 {
        display: flex;
        align-items: center;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/baloons.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        padding-top: 50px;
        color: black; 
        padding-right: 20vh;
    }

    .form-group {
        margin-top: 10px;
        font-size: 18px;
    }

    .form-control {
        margin-bottom: 1rem;
        border-radius: 10px;
        radius: 20px;
        padding: 8px;
        width: 160%;
        font-size: 18px;
    }

    .btn-primary {
        font-size: 1rem;
        border-radius: 50px;
        padding: 12px 24px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .padding {
        padding-bottom: 10px;
    }

</style>
<div class="container2">
    <h2>Edit Blog Post</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog.update', $blogpost->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $blogpost->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $blogpost->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
