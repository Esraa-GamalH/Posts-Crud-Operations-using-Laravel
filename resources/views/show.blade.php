@extends('layouts.app')

@section('container')
<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title">Title: {{current($post)['title']}}</h5>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores repellendus odio labore adipisci fugit, accusamus praesentium cupiditate nostrum quisquam amet? Obcaecati inventore aspernatur aliquam distinctio voluptatibus quae! Hic, illo deserunt.</p>
        <h6>Posted By: {{current($post)['postedBy']}}</h6>
        <a href="{{route("posts.index")}}" class="btn btn-primary">View All Posts</a>
    </div>
</div>
@endsection