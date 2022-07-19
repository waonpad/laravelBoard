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
                        <form action="{{ route('update_info') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="formControlTextarea" class="form-label">ユーザー名</label>
                                <input class="form-control" id="formControlTextarea" name="user-name"
                                    value="{{ $user_record->name }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="formControlTextarea" class="form-label">コメント</label>
                                <textarea class="form-control" id="formControlTextarea" name="user-bio">
{{ $user_record->user_infos->content ?? '' }}
</textarea>
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-primary" type="submit">変更する</button>
                                <a href="/user/{{ $user_record->id }}" class="btn btn-secondary aiueo">戻る</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
