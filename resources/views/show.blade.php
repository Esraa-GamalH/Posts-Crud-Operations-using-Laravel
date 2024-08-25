@extends('layouts.app')

@section('container')
<div class="card mt-5 w-50 m-auto">
    <h5 class="card-header bg-primary text-white">Post Info</h5>
    <div class="card-body bg-primary-subtle">
        <h5 class="card-title">Title: {{current($post)['title']}}</h5>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores repellendus odio labore adipisci fugi.</p>
        <h6>Posted By: {{current($post)['postedBy']}}</h6>
        <a href="{{route("posts.index")}}" class="btn btn-primary">View All Posts</a>
    </div>
</div>
@endsection