@extends('layout.layout')

@section('content')
    <div class="container d-flex mt-2 mb-2 align-items-center">
        <p class="h3 mb-0">ひとこと掲示板</p>
        @auth
            <div class="ms-auto">
                <a id="button_all_comments" class="btn btn-sm btn-outline-secondary me-3 {{ Request::routeIs('home') ? 'active' : '' }}" role="button" href="/">All Comments</a>
                <a id="button_follow_users_comments" class="btn btn-sm btn-outline-secondary {{ Request::routeIs('post.follows') ? 'active' : '' }}" role="button" href="/post/follows">Following Comments</a>
            </div>
        @endauth
    </div>
    @include('post.index', ['posts' => $posts ?? ''])
@endsection