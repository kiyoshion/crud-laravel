@extends('layout')
@section('content')
<main class="container">
    <div>
        <h1>投稿登録</h1>
    </div>
    @include('post/form', ['target' => 'store'])
</main>
@endsection
