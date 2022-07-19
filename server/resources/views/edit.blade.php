@extends('layout.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            投稿編集
        </div>
        <div class="card-body">
            {{ Form::open(['route' => ['post.update', $post->id], 'method' => 'PUT']) }}
            {{ Form::token() }}

            <div class="form-group mb-2">
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => '']) }}
            </div>

            @foreach ($categories as $key => $category)
                <div class="form-check mb-1">
                    {{ Form::checkbox('category[]', $category->id, $checked_categories[$key] ? true : false, ['class' => 'form-check-input', 'id' => $category->id]) }}
                    {{ Form::label($category->id, $category->category) }}
                </div>
            @endforeach

            {{ Form::submit('編集を完了する', ['class' => 'btn btn-primary']) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection
