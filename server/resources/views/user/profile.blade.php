@extends('layout.layout')

@section('content')
  <div class="container">
    <div class="w-75 mx-auto">
        <div class="container d-flex mt-2 mb-2 align-items-center">
            <p class="h3 mb-0">{{ $user['name'] }}</p>
            <div class="me-auto">
                @if($ffcheck['myself'])
                    <a class="btn btn-sm btn-outline-secondary ms-3" role="button" href="/user/edit">Edit Profile</a>
                @endif
                @if(!$ffcheck['myself'])
                    <form action="/user/follow/{{ $user['id'] }}" method="post">
                        <button type="submit" class="btn btn-sm btn-outline-secondary ms-3" id="follow{{ $user['id'] }}">{{ $ffechk['follow'] ? 'unFollow' : 'Follow' }}</button>
                    </form>
                @endif
            </div>
            <div class="ms-auto">
                <a id="button_comments" class="btn btn-sm btn-outline-secondary me-3 {{ Request::routeIs('user.show') ? 'active' : '' }}" role="button" href="/user/{{ $user['id'] }}">Comments</a>
                <a id="button_likes" class="btn btn-sm btn-outline-secondary me-3 {{ Request::routeIs('user.likes') ? 'active' : '' }}" role="button" href="/user/{{ $user['id'] }}/likes">Likes</a>
                <a id="button_follows" class="btn btn-sm btn-outline-secondary me-3 {{ Request::routeIs('user.follows') ? 'active' : '' }}" role="button" href="/user/{{ $user['id'] }}/follows">Follows</a>
                <a id="button_followers" class="btn btn-sm btn-outline-secondary {{ Request::routeIs('user.followers') ? 'active' : '' }}" role="button" href="/user/{{ $user['id'] }}/followers">Followers</a>
            </div>
        </div>
        <table class="table table-striped text-center">
            {{-- @dd($user); --}}
            <tr>
                <th scope="row">Age</th>
                <td>{{ $user['age'] }}</td>
            </tr>
            <tr>
                <th scope="row">Gender</th>
                <td>{{ $user['gender'] }}</td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td>{{ $user['description'] }}</td>
            </tr>
        </table>
        <!-- ユーザーの投稿 / いいね一覧 -->
        @if(Request::routeIs('user.show'))
            @include('post.index', ['posts' => $user->posts])
        @endif
        @if(Request::routeIs('user.likes'))
            @include('post.index', ['posts' => $user->likes])
        @endif
        <!-- フォロー / フォロワー一覧 -->
        @if(Request::routeIs('user.follows'))
            @include('user.index', ['users' => $user->follows])
        @endif
        @if(Request::routeIs('user.followers'))
            @include('user.index', ['users' => $user->followers])
        @endif
    </div>
  </div>
@endsection