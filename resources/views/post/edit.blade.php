@extends('layout')
@section('content')
<main class="container">
    <div>
        <h1>投稿編集</h1>
    </div>
    @include('post/form', ['target' => 'update'])
</main>
@endsection
