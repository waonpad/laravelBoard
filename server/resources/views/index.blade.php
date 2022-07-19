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
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-1">編集</a>
                            {{ Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE']) }}
                            {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endsection
