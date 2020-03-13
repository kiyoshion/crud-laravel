<div>
    @if($target === 'store')
    <form action="/post" method="post">
    @elseif($target === 'update')
    <form action="/post/{{ $post->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="title">本文</label>
            <textarea name="body">{{ $post->body }}</textarea>
        </div>
        <div>
            <a href="/post">戻る</a>
            @if($target === 'store')
            <button type="submit">登録</button>
            @elseif($target === 'update')
            <button type="submit">更新</button>
            @endif
        </div>
    </form>
</div>