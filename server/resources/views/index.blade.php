@extends('layout.layout')

@section('content')
    @isset($posts)
        <table class="table">
            <thead>
                <th>ID</th>
                <th>内容</th>
                <th>カテゴリー</th>
                <th>操作</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->body }}</td>
                        <td>
                            @foreach ($post->categories as $category)
                                <span>{{ $category->category }}</span>
                            @endforeach
                        </td>
                        <td style="min-width: 160px">
                            <a href="" class="btn btn-primary">編集</a>
                            <a href="" class="btn btn-danger">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endsection
