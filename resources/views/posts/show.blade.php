@extends('layouts.app')

@section('title', '投稿詳細')
@section('description', '投稿詳細です。')
@section('hero__ttl', '投稿詳細')

@section('content')
<div class="content__thumbnail">
    @if(!empty($post->thumbnail))
    <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
    @else 
    <img src="{{ asset('img/default/thumbnail.jpg') }}" alt="{{ $post->title }}">
    @endif
</div>
<h1 class="content__ttl">{{ $post->title }}</h1>
<div class="content__body">
    <p>{{ $post->body }}</p>
</div>
<div class="likes_count">{{ $post->likes_count }}</div>
@if(Auth::check())
    @if(Auth::user()->is_like($post->id))
        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいねをキャンセル') !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::submit('いいねする') !!}
        {!! Form::close() !!}
    @endif
@endif
<div class="content__like">
<div class="content__comments-list">
    @if(count($comments) != 0)
        @foreach($comments as $comment)
            <div class="content__comment-item">
                <div class="content__comment-avatar">
                    @if(!empty($comment->user->avatar))
                        <img src="{{ asset($comment->user->avatar) }}" alt="{{ $comment->user->name }}" width="50">
                    @else
                        <img src="/img/default/avatar.svg" alt="{{ $comment->user->name }}" width="50">
                    @endif
                </div>
                {{ $comment->user->name }}
                {{ $comment->body }}
            </div>
        @endforeach
    @else
        <p>コメントはまだありません。</p>
    @endif
</div>
@if(Auth::check())
    <form action="/posts/{{ $post->id }}/comments" method="POST">
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        @csrf
        <div class="form-group">
            <label for="body">コメント</label>
            <textarea name="body" id="body" cols="100" rows="5"></textarea>
        </div>
        <button type="submit">コメント</button>
    </form>
@else
    <p><a href="/login">ログイン</a>してコメントする。</p>
@endif

</div>
<a class="btn btn-default" href="/posts">一覧へ戻る</a>
@endsection