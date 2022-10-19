<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'user_id'
    ];

    protected $table = 'posts';

    // ToDo: Categoryとリレーションで繋げる
    public function categories() {
      return $this->belongsToMany(Category::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function likeUsers() {
        return $this->belongsToMany('App\Models\User', 'likes', 'post_id', 'user_id');
    }
}
