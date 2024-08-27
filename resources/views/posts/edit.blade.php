@extends('layouts.app')

@section('container')
<h1 class="text-success text-center">Edit Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="w-50 m-auto mt-5" action="{{route("posts.update", $post->id)}}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="createdAt" class="form-label">Created At</label>
            <input type="datetime-local" class="form-control" id="createdAt" name="createdAt" value="{{ $post->createdAt}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select class="form-select" name="postedBy">
                <option value="Esraa">Esraa</option>
                <option value="Gamal">Gamal</option>
                <option value="Adham">Adham</option>
            </select>
        </div>
        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection