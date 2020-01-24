<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\User;
use App\Tag;
use Storage;

class TopController extends Controller
{
    public function show() 
    {
        $articles = Article::latest('created_at')->get();

        $path = Storage::disk('s3')->url('profile_images/');
        
        $tags = Tag::latest('created_at')->get();
        
        return view('welcome', ['articles' => $articles, 'path' => $path, 'tags' => $tags]);
    }
  
    public function introduction() 
    {
        $path = Storage::disk('s3')->url('profile_images/');
        
        return view('introduction', ['path' => $path]);
    }
}
