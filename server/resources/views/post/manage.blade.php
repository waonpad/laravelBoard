@extends('layout.layout')

@section('content')
    <div class="container">
        <form action="{{ url('post/upsert') }}" method="POST" id="form">
            @csrf
            <input type="hidden" name="id" value="{{ $post['id'] ?? '' }}">
            <p class="mb-1">タイトル*</p><input class="form-control border-secondary mb-3 @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $post['title'] ?? '') }}" placeholder="(50文字まで)">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <p class="mb-1">ひとこと*</p><textarea class="mb-2 @error('comment') is-invalid @enderror" id="comment" name="comment" rows="4" cols="40" placeholder="(200文字まで)">{{ old('comment', $post['comment'] ?? '') }}</textarea>
            @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <p id="comment-error" class="error"></p>
            <div class="form-group">
                <p class="control-label mb-1">カテゴリー</p>
                @if(!empty($categories))
                    <div class="form-inline">
                        @foreach($categories as $category)
                            <label class="checkbox-inline me-3"><input class="@error('categories') is-invalid @enderror" type="checkbox" name="categories[]" value="{{ $category['id'] }}" {{ isset($post) ? $post->categories->pluck('id')->contains($category['id']) ? 'checked' : '' : ''}}>{{ $category['name'] }}</label>
                        @endforeach
                    </div>
                    @error('categories')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif
                <input type="text" class="form-control border-secondary  mt-3 @error('new_category') is-invalid @enderror" name="new_category" placeholder="新しいカテゴリーを作る(50文字まで)">
                @error('new_category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary text-center mt-3 mb-5 w-100">書き込む</button>
        </form>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function(){
            tinymce.init({
                selector: 'textarea#comment',
            })
        })
    </script>
@endsection
