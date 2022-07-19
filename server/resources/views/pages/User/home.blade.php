@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- メール認証 --}}
                @if (session('status'))
                    <div class="card mb-3">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif

                {{--  --}}
                @if (session('alert'))
                    <div class="alert alert-{{ session('alert.type') }} mb-3">
                        <div>{!! nl2br(e(session('alert.message'))) !!}</div>
                    </div>
                @endif

                <div class="card mb-3">
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
                        <form action="{{ url('/store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="formControlTextarea" class="form-label">コメント</label>
                                <textarea class="form-control" id="formControlTextarea" name="content"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <p class="form-label">カテゴリーを選択する</p>

                                @forelse ($categories as $category)
                                    <div class="mb-1 form-check">
                                        <input type="checkbox" name="categories[]" id="checkbox-{{ $category->id }}"
                                            class="form-check-input" value="{{ $category->id }}">
                                        <label for="checkbox-{{ $category->id }}" class="form-check-label">
                                            {{ $category->category }}
                                        </label>
                                    </div>
                                @empty
                                    {{--  --}}
                                @endforelse

                            </div>
                            <button type="submit" class="btn btn-primary">投稿する</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('show') }}" method="GET">
                            <p class="form-label">カテゴリー検索</p>
                            <select name="category" id="" class="form-select mb-2">
                                <option value @if (!isset($target_category)) {{ 'selected' }} @endif>全投稿を表示
                                </option>

                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}
                                        @if (isset($target_category)) @if ($category->id === $target_category)
                                        {{ 'selected' }} @endif
                                        @endif
                                        >{{ $category->category }}</option>
                                @endforeach

                            </select>
                            <input type="submit" value="検索する" class="btn btn-primary">
                        </form>
                    </div>
                </div>

                @if ($contributions && $categories)
                    @forelse ($contributions as $contribution)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/user/{{ $contribution->user_id }}" class="link-dark">
                                        {{ $contribution->user->name }}
                                    </a>
                                </h5>
                                <h6 class="card-subtitle mb-1">
                                    Published: {{ $contribution->created_at }}　Updated:
                                    {{ $contribution->updated_at ? $contribution->updated_at : '' }}
                                </h6>
                                <div class="card-text mb-3">
                                    {!! nl2br(htmlspecialchars($contribution->content)) !!}
                                </div>

                                @if (Auth::user()->id === $contribution->user_id)
                                    <div class="d-flex gap-1">
                                        @csrf
                                        <a href="/edit/{{ $contribution->id }}" class="btn btn-primary">編集する</a>
                                        <form action="{{ route('delete', $contribution->id) }}" method="contribution">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除する</button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                            <div class="card-footer">
                                Category :

                                @forelse($contribution->contribution_categories as $category)
                                    {{ $category->category }},
                                @empty
                                    ---
                                @endforelse

                            </div>
                        </div>
                    @empty
                        <div>該当結果なし</div>
                    @endforelse
                @endif

            </div>
        </div>
    </div>
@endsection
