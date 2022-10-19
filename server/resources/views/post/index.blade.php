<style>
    img {
        max-width: 300px;
    }
</style>
<div class="container">
    @if(!empty($posts))
        @foreach($posts as $post)
            <div class="card border-secondary mb-3" style="width: auto;" id="comment{{ $post['id'] }}">
                <div class="card-header d-flex align-items-center">
                    <h4 class="mb-0 me-auto">{{ $post['title'] }}</h4>
                    @if(!empty($post['categories']))
                        <div>
                            @foreach($post['categories'] as $belonged_category)
                                <small class="ms-1"><a class="card-link" href="post/category/{{ $belonged_category['category_id'] }}">{{ $belonged_category['name'] }}</a></small>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $post['comment'] !!}</p>
                </div>
                <div class="card-footer d-flex align-items-end">
                    <div>
                        <p class="card-text me-3"><small class="text-muted">{{ $post['created_at'] }}</small></p>
                    </div>
                    <div class="me-auto">
                        <p class="card-text"><small class="text-muted"><a class="text-decoration-none" href="user/{{ $post['user_id'] }}">Posted By : {{ $post->user->name }}</a></small></p>
                    </div>
                    @auth
                        @if(auth()->user()->id !== $post['user_id'])
                            <form action="post/likeorunlike/{{ $post['id'] }}" method="post">
                                @csrf
                                <button type="submit" id="like{{ $post['id'] }}" class="btn btn-warning" name="like">
                                    {{-- 上手く判定できない --}}
                                    {{ in_array(auth()->user()->id, array($post['likeUsers']), true) ? '♥' : '♡' }}
                                </button>
                            </form>
                        @endif
                        @if(auth()->user()->id === $post['user_id'])
                            <a href="post/edit/{{ $post['id'] }}"><input class="btn btn-primary me-3" type="button" value="編集"></a>
                            <form action="post/destroy/{{ $post['id'] }}" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit" name="delete">削除</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    @endif
</div>
