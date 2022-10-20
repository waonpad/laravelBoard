<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'age',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // フォロワー→フォロー
    public function followers() {
        return $this->belongsToMany('App\Models\User', 'follows', 'followed_user_id', 'following_user_id');
    }

    // フォロー→フォロワー
    public function follows() {
        return $this->belongsToMany('App\Models\User', 'follows', 'following_user_id', 'followed_user_id');
    }

    // ユーザーのpost一覧
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // ユーザーのlike一覧
    public function likes() {
        return $this->belongsToMany('App\Models\Post', 'likes', 'user_id', 'post_id');
    }
}
