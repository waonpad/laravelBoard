<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class likeController extends Controller
{
    public function likeOrUnlike($id) {
        $user = Auth::user();
        $user->likes()->toggle($id);

        return back();
    }
}
