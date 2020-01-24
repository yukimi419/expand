<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;
use App\Article;
use Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $is_image = false;
        $pathP = Storage::disk('s3')->url('profile_images/' . $user->id . '.jpg');
        if (Storage::disk('s3')->exists('/profile_images/' . $user->id . '.jpg')) {
            $is_image = true;
        }
        
        $count = $user->articls()->count();
        
        $total = 0;
        
        $articles = User::find($user->id)->articls()->get();
        
        $genres = $articles->groupBy(function ($row) {return $row->genre;});
        
        $genre_counts = [];
        
        $genre_counts['music'] = 0;
        $genre_counts['cinema'] = 0;
        $genre_counts['anime'] = 0;
        $genre_counts['game'] = 0;
        $genre_counts['comic'] = 0;
        $genre_counts['food'] = 0;
        $genre_counts['store'] = 0;
        $genre_counts['back'] = 0;
        
        foreach($genres as $genre => $data){
            $genre_counts[$genre] = $data->count(); 
        }
        
        foreach($articles as $article){
            $total += $article->likes_count;
        }
        
        $posts = User::find($user->id)->articls()->latest('created_at')->get();
        
        $years = User::find($user->id)->articls()->orderBy('created_at')->get()->groupBy(function ($row) {
                    return $row->created_at->format('Y');
                 });
        
        $yearMonths =  User::find($user->id)->articls()->orderBy('created_at')->get()->groupBy(function ($row) {
                          return $row->created_at->format('Ym');
                       });
        
        foreach($years as $year => $data){
            $yearCounts[$year] = $data->count();
        }
                 
        foreach($years as $year => $data){
            $montlys = User::find($user->id)->articls()->whereYear('created_at', $year)->orderBy('created_at')->get()->groupBy(function ($row) {
                    return $row->created_at->format('m');
            });
            $months[$year] =  $montlys;
        }
        
        foreach($yearMonths as $yearMonth => $data){
            $yearMonthCounts[$yearMonth] = $data->count();
        }
        
        $path = Storage::disk('s3')->url('profile_images/');
        
        return view('user.profile.show', compact('user', 'is_image', 'pathP', 'path', 'count', 'posts', 'total', 'years', 'months', 'yearCounts', 'yearMonthCounts', 'genre_counts'));
    }
    
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        
        $path = Storage::disk('s3')->url('profile_images/');
        
        return view('user.profile.edit', ['user' => $user, 'path' => $path]);
    }
    
    public function update(UserRequest $request,User $user)
    {
        $this->authorize('edit', $user);
        $user->name = $request->name;
        $user->profile = $request->profile;
        $user->twitter_id = $request->twitter_id;
        
        if($request->photo != null){
            $photo = $request->file('photo');
            $path = Storage::disk('s3')->putFileAs('/profile_images', $photo, Auth::id().'.jpg', 'public');
            $user->image_path = 1;
        };
        
        $user->save();
        
        return redirect()->route('profile.show', [$user->id])->with('message', 'プロフィールを更新しました。');
    }

}
