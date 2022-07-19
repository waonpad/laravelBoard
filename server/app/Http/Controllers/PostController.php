<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $post = Post::create(['body' => $request['body']]);
        $post->categories()->sync($request['category']);
        return redirect(route('post.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::with('categories')->findOrFail($id);
        $temp_category = $post->categories()->pluck('id')->toArray();

        // カテゴリー判別(blade側のcheckboxに既存の値を入れる為)
        foreach ($categories as $category) {
            in_array($category->id, $temp_category)
                ? $checked_categories[] = true
                : $checked_categories[] = false;
        }

        return view('edit', compact('post', 'checked_categories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->all();
        $post = Post::with('categories')->findOrFail($id);
        $post->update(['body' => $request['body']]);
        $post->categories()->sync($request['category']);
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::with('categories')->findOrFail($id)->delete();
        return redirect(route('post.index'));
    }
}
