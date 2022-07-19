@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="card mb-3">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                @endif

                <div class="card mb-4">
                    <div class="card-body">

                        @if (Auth::user()->id === $user_record->id)
                            <div class="d-flex justify-content-end">
                                <a href="/edit_info" class="btn btn-outline-primary">プロフィールを編集する</a>
                            </div>
                        @endif

                        <h5 class="card-title">
                            {{ $user_record->name }}
                        </h5>
                        <h6 class="card-subtitle">
                            @if ($user_record->user_infos)
                                {!! nl2br(htmlspecialchars($user_record->user_infos->content)) !!}
                            @else
                                {{--  --}}
                            @endif
                        </h6>
                    </div>
                </div>

                @forelse($user_record->user_contributions as $contribution)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $user_record->name }}
                            </h5>
                            <h6 class="card-subtitle mb-1">
                                Published: {{ $contribution->created_at }}　Updated:
                                {{ $contribution->updated_at ? $contribution->updated_at : '' }}
                            </h6>
                            <div class="card-text mb-3">
                                {!! nl2br(htmlspecialchars($contribution->content)) !!}
                            </div>

                            @if (Auth::user()->id === $user_record->id)
                                <div class="d-flex gap-1">
                                    @csrf
                                    <a href="/edit/{{ $contribution->id }}" class="btn btn-primary">編集する</a>
                                    <form action="{{ route('delete', $contribution->id) }}" method="post">
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
                    {{--  --}}
                @endforelse

            </div>
        </div>
    </div>
@endsection
