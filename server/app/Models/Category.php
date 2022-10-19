<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    protected $table = 'categories';

    // ToDo: Postとリレーションで繋げる
    public function users() {
      return $this->belongsToMany(User::class);
    }
}
