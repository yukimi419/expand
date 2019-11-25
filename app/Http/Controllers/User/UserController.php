<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;
use Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $is_image = false;
        $path = Storage::disk('s3')->url('profile_images/' . $user->id . '.jpg');
        if (Storage::disk('s3')->exists('/profile_images/' . $user->id . '.jpg')) {
            $is_image = true;
        }
        
        return view('user.profile.show', ['user' => $user,'is_image' => $is_image,'path' => $path]);
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
            $photo = $request->file('photo');
            $path = Storage::disk('s3')->putFileAs('/profile_images', $photo, Auth::id().'.jpg', 'public');
        };
        
        return redirect()->route('profile.show', [$user->id])->with('message', 'プロフィールを更新しました。');
    }

}
