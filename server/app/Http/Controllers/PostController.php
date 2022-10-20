<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpsertPostRequest;

class PostController extends Controller
{
    /**
     * ToDo: 投稿を一覧表示する機能を実装
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();

        return view('home', compact('posts'));
    }

    /**
     * ToDo: 新規投稿ページを表示する機能を実装
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::get();

        return view('post.manage', compact('categories'));
    }

    /**
     * ToDo: 新規投稿を登録する機能を実装
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upsert(UpsertPostRequest $request)
    {
        $categories = $request->categories ? $request->categories : [];

        if($request->filled('new_category')) {
            if(!$id = Category::where('name', $request->new_category)->first()) {
                $id = Category::create([
                    'name' => $request->new_category
                ])->id;
            }
            array_push($categories, $id);
        }

        $post = Post::updateOrCreate(
            ['id'=>$request->id],
            [
                'title' => $request->title,
                'comment' => $request->comment,
                'user_id' => Auth::user()->id
            ]
        );

        $post->categories()->sync($categories);

        return redirect('home');
    }

    /**
     * ToDo: 投稿編集ページを表示する機能を実装
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::get();

        return view('post.manage', compact('post', 'categories'));
    }

    public function show($id) {

    }

    /**
     * ToDo: 投稿削除機能を実装
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return back();
    }

    public function follows() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_user_id'))->latest()->get();

        return view('home', compact('posts'));
    }

    public function category($id) {
        $posts = Category::find($id)->posts;

        return view('home', compact('posts'));
    }
}
