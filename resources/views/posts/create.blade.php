@extends('layouts.app')

@section('title', '投稿登録')
@section('description', '投稿の新規登録です。')
@section('hero__ttl', '新規登録')

@section('content')
@include('posts/form', ['target' => 'store'])
@endsection
