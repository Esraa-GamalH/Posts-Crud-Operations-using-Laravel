@extends('layouts.app')

@section('container')
    <h1 class="text-success text-center">Create New Post</h1>

    <form class="w-50 m-auto mt-5" action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" > {{old('description')}} </textarea>
            @error('description')
                <div class="alert alert-danger mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="createdAt" class="form-label">Created At</label>
            <input type="datetime-local" class="form-control" id="createdAt" name="createdAt" value="{{ old('createdAt') }}">
            @error('createdAt')
                <div class="alert alert-danger mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" name="image" class="form-control"  >
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select class="form-select" name="postedBy">
                <option value="" disabled selected>Please choose a creator for the post</option>
                <option value="Esraa">Esraa</option>
                <option value="Gamal">Gamal</option>
                {{-- @foreach($posts as $post)
                <option value="{{$post->postedBy}}"
                    {{ old('postedBy') == $post->postedBy ? 'selected' : '' }}>
                    {{ old('postedBy') }}
                </option>

                @endforeach --}}
            </select>
            @error('postedBy')
                <div class="alert alert-danger mt-1">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection