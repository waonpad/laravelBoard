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
    public function follow($id) {
        $user = Auth::user();

        $followed_user = User::find($id);

        $exist = Follow::where('following_user_id', $user->id)->where('followed_user_id', $followed_user->id)->first();

        if($exist == null) {
            $follow = Follow::create([
                'following_user_id' => $user->id,
                'followed_user_id' => $followed_user->id,
            ]);

            // $followed_user->notify(new CommonNotification($follow));
            return back(); // 成功
        }
        else {
            return back(); //　失敗
        }
    }

    public function unfollow($id) {
        $user = Auth::user();

        $followed_user = User::find($id);
        
        $exist = Follow::where('following_user_id', $user->id)->where('followed_user_id', $followed_user->id)->first();

        if($exist == null) {
            return back(); // 失敗
        }
        else {
            $follow = Follow::where('following_user_id', $user->id)->where('followed_user_id', $followed_user->id)->first();
            $follow->delete();
            return back(); // 成功
        }
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