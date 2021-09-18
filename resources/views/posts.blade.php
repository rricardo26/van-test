@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="display-4 text-center">Posts</h4>
    @foreach ($posts as $post)
        <div class="row justify-content-center pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        <p>{{ $post->body }}</p>
                        <p class="text-right">{{ $post->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
