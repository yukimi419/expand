<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Article;

class TopController extends Controller
{
    public function show() 
  {
        $articles = Article::latest('created_at')->get();
        return view('welcome', ['articles' => $articles]);
  }
}
