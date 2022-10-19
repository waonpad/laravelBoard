<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::get();

        return view('user.index', compact('users'));
    }

    public function show($id) {
        $user = User::with(['posts', 'likes', 'follows', 'followers'])->find($id);
        $follow_controller = app()->make('App\Http\Controllers\FollowController');
        $ffcheck = $follow_controller->ffcheck(intval($id));

        return view('user.profile', compact('user', 'ffcheck'));
    }

    public function edit(Request $_request) {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(Request $_request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'description'=> ['string', 'max:255']
        ]);
        // {field}_confirmation

        $user = Auth::user()->update([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'description' => $request['description']
        ]);

        return redirect('home');
    }

    public function destroy(Request $_request) {
        User::find($request->id)->delete();
        // TODO:トークンを削除する
    }
}
