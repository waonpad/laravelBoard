@extends('layout.layout')

@section('content')
  <div class="container">
    <form action="{{ url('post/upsert') }}" method="POST" id="form">
        @csrf
        <p class="mb-1">タイトル*</p><input class="form-control border-secondary mb-3" type="text" name="title" placeholder="(50文字まで)">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        <p class="mb-1">ひとこと*</p><textarea class="mb-2" id="comment" name="comment" rows="4" cols="40" placeholder="(200文字まで)"></textarea>
        @if ($errors->has('comment'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('comment') }}</strong>
            </span>
        @endif
        <p id="comment-error" class="error"></p>
        <div class="form-group">
            <p class="control-label mb-1">カテゴリー</p>
            @if(!empty($categories))
                <div class="form-inline">
                    @foreach($categories as $category)
                        <label class="checkbox-inline me-3"><input type="checkbox" name="category" value="category{{$category['id']}}">{{$category['name']}}</label>
                    @endforeach
                </div>
                @if ($errors->has('categories'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('categories') }}</strong>
                    </span>
                @endif
            @endif
            <input type="text" class="form-control border-secondary  mt-3" name="new_category" placeholder="新しいカテゴリーを作る(50文字まで)">
            @if ($errors->has('new_category'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('new_category') }}</strong>
                </span>
            @endif
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
