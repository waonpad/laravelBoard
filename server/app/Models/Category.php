<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    protected $table = 'categories';

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function users() {
    return $this->belongsToMany(User::class);
    }
}
