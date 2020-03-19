<div>
    @if($target === 'store')
    <form action="/posts" method="post" enctype="multipart/form-data">
    @elseif($target === 'update')
    <form action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-form-label" for="title">タイトル</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <div class="form-thumbnail">
                @if (!empty($post->thumbnail))
                <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                @endif
            </div>
            <label class="col-form-label" for="thumbnail">画像</label>
            <input type="file" name="thumbnail" class="">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="title">本文</label>
            <textarea class="form-control" name="body">{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
            <a class="btn btn-default" href="/posts">戻る</a>
            @if($target === 'store')
            <button type="submit" class="btn btn-primary">登録</button>
            @elseif($target === 'update')
            <button type="submit" class="btn btn-primary">更新</button>
            @endif
        </div>
    </form>
</div>