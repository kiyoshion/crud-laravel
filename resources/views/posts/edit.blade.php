@extends('layouts.app')

@section('title', '投稿編集')
@section('description', '投稿編集画面です。')
@section('hero__ttl', '投稿編集')

@section('content')
@include('posts/form', ['target' => 'update'])
@endsection
