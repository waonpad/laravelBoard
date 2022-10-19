<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Follow extends Pivot
{
    protected $fillable = ['following_user_id', 'followed_user_id'];

    protected $table = 'follows';

}
