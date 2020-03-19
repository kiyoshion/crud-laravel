@extends('layouts.app')

@section('title', '投稿一覧')
@section('description', '投稿一覧です。')
@section('hero__ttl', '投稿一覧')

@section('content')
<a class="btn btn-primary" href="/posts/create">新規作成</a>
<div class="post__list">
    @foreach($posts as $post)
    <div class="post__item">
        <a class="post__link" href="/posts/{{ $post->id }}"></a>
        <div class="post__thumbnail">
            @if (!empty($post->thumbnail))
            <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
            @else
            <img src="{{ asset('img/default/thumbnail.jpg') }}" alt="{{ $post->title }}">
            @endif
        </div>
        <h2 class="post__ttl">{{ $post->title }}</h2>
    </div>
    @endforeach
</div>
@endsection
