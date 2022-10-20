<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\CommonNotification;

class FollowController extends Controller
{
    public function followToggle($id) {
        $user = Auth::user();

        $toggle_result = $user->follows()->toggle($id);
        if(in_array($id, $toggle_result['attached'])) {
            $follow_status = true;
        }
        else if(in_array($id, $toggle_result['detached'])) {
            $follow_status = false;
        }

        return back();
    }

    public function ffcheck($id) {
        $user = Auth::user();
        $target_user = User::find($id);
        $follow = Follow::where('following_user_id', $user->id)->where('followed_user_id', $target_user->id)->first();
        $followed = Follow::where('following_user_id', $target_user->id)->where('followed_user_id', $user->id)->first();

        return [
            'myself' => $user->id == $target_user->id ? true : false,
            'follow' => $follow ? true : false,
            'followed' => $followed ? true : false,
        ];
    }
}