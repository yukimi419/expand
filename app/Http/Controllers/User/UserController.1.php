<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . $user->id . '.jpg')) {
            $is_image = true;
        }
        
        return view('user.profile.show', ['user' => $user,'is_image' => $is_image]);
    }
    
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('user.profile.edit', ['user' => $user]);
    }
    
    public function update(UserRequest $request,User $user)
    {
        $this->authorize('edit', $user);
        $user->name = $request->name;
        $user->profile = $request->profile;
        $user->twitter_id = $request->twitter_id;
        $user->save();
        
        if($request->photo != null){
            $request->photo->storeAs('public/profile_images', Auth::id().'.jpg');
        };
        
        return redirect()->route('profile.show', [$user->id])->with('message', 'プロフィールを更新しました。');
    }
    
}
