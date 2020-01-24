<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\User;
use App\Tag;
use Storage;

class JobController extends Controller
{
    //ナビゲーションバーのプロフィール画像表示メソッド
    static function path()
    {
        $img_path = Storage::disk('s3')->url('profile_images/');
        
        return $img_path;
    }
}
