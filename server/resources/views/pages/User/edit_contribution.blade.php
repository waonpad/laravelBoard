@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('alert'))
                    <div class="alert alert-{{ session('alert.type') }} mb-3">
                        <div>{!! nl2br(e(session('alert.message'))) !!}</div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('update', $contribution_record->id) }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="formControlTextarea" class="form-label">コメント</label>
                                <textarea class="form-control" id="formControlTextarea" name="content">{{ $contribution_record->content }}</textarea>
                            </div>
                            <div class="mb-3 form-group">
                                <p class="form-label">カテゴリーを選択する</p>

                                @forelse($categories as $key=> $category)
                                    <div class="form-check mb-1">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                            id="checkbox-{{ $category->id }}" class="form-check-input"
                                            {{ $contribution_categories[$key] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkbox-{{ $category->id }}">
                                            {{ $category->category }}
                                        </label>
                                    </div>
                                @empty
                                    {{--  --}}
                                @endforelse

                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-primary" type="submit">編集する</button>
                                <a href="{{ route('index') }}" class="btn btn-secondary">戻る</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
