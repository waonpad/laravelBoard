@extends('layout.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            新規投稿
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'store', 'method' => 'POST']) }}
            {{ Form::token() }}

            <div class="form-group mb-2">
                {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => '']) }}
            </div>

            @foreach ($categories as $category)
                <div class="form-check mb-1">
                    {{ Form::checkbox('category[]', $category->id, false, ['class' => 'form-check-input', 'id' => $category->id]) }}
                    {{ Form::label($category->id, $category->category) }}
                </div>
            @endforeach

            {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection
