@extends('layout')
@section('content')
<main class="container">
    <div>
        <a href="/post/create">新規作成</a>
    </div>
    <table>
        <tbody>
            <tr>
                <th>id</th>
                <th>タイトル</th>
                <th>本文</th>
                <th>操作</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                    <a href="/post/{{ $post->id }}/edit">編集</a>
                    <form action="/post/{{ $post->id }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" >削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
