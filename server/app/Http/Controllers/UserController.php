<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index() {
        $users = User::get();

        return view('user.index', compact('users'));
    }

    public function show($id) {
        $user = User::find($id);
        $follow_controller = app()->make('App\Http\Controllers\FollowController');
        $ffcheck = $follow_controller->ffcheck(intval($id));

        return view('user.profile', compact('user', 'ffcheck'));
    }

    public function edit(Request $request) {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request) {
        $user = Auth::user()->update([
            'name' => $request['name'],
            // 'password' => Hash::make($request['password']),
            'description' => $request['description'],
            'age' => $request['age'],
            'gender' => $request['gender']
        ]);

        return redirect('home');
    }

    public function destroy(Request $request) {
        User::find($request->id)->delete();
        // TODO:トークンを削除する
    }
}
