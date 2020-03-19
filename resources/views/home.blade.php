@extends('layouts.app')

@section('title', 'マイページ')
@section('description', 'マイページ')
@section('hero__ttl', 'マイページ')

@section('content')

<h2>作成した投稿</h2>
<div class="post">
    <div class="post__list">
        
    @foreach($posts as $post)
        <div class="post__item">
            <a href="/posts/{{ $post->id }}" alt="{{ $post->title }}">
                <div class="post__thumbnail">
                    @if (!empty($post->thumbnail))
                    <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                    @else
                    <img src="{{ asset('img/default/thumbnail.jpg') }}" alt="{{ $post->title }}">
                    @endif
                </div>
            </a>
            <h2 class="post__ttl">{{ $post->title }}</h2>
            <div class="post__actions">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
                <form action="/posts/{{ $post->id }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-default" type="submit" >削除</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection
