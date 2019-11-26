<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller
{
    public function add()
  {
      return view('user.article.create');
  }
  
  public function create(ArticleRequest $request)
  {

      $article = new Article;
      $article->title = $request->title;
      $article->genre = $request->genre;
      $article->body = $request->body;
      $article->user_id = Auth::user()->id;
      
      if ( strpos( $request->body , 'img' ) === false ) {
          $article->image_path = null;
        } else {
            $file_content = substr($request->body,0);
            $res = null;
            preg_match('/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $file_content, $res);
            $article->image_path = $res[1];
          }
 
      $article->save();
      
      return redirect('user/article/index')->with('message', '記事を作成しました。');
  }
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Auth::user()->articls()->where('title','LIKE',"%{$cond_title}%")->paginate(10);
      } else {
          // それ以外は自分の書いたすべての記事を取得する
          $posts = Auth::user()->articls()->latest('created_at')->paginate(10);
      }
      
      return view('user.article.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function edit(Article $article)
  {
      $this->authorize('edit', $article);
      return view('user.article.edit', ['article' => $article]);
  }
  
  public function update(ArticleRequest $request,Article $article)
  {
      $this->authorize('edit', $article);
      $article->title = $request->title;
      $article->genre = $request->genre;
      $article->body = $request->body;
      
      if ( strpos( $request->body , 'img' ) === false ) {
          $article->image_path = null;
        } else {
            $file_content = substr($request->body,0);
            $res = null;
            preg_match('/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $file_content, $res);
            $article->image_path = $res[1];
          }
      
      $article->save();

      return redirect('user/article/index')->with('message', '記事を更新しました。');
  }
  
  public function show(Article $article) 
  {
        return view('user.article.show', ['article' => $article]);
  }
  
   public function genre($genre) 
  {
        $posts = Article::where('genre', $genre)->latest('created_at')->paginate(10);
        return view('user.article.refine', ['posts' => $posts]);
  }
  
  public function destroy(Article $article)
    {
        $this->authorize('edit', $article);
        $article->delete();
        return redirect('user/article/index')->with('message', '記事を削除しました。');
    }
  
  public function mypage(Request $request)
  {
      $id = Auth::id();
      $posts = Article::where('user_id', $id)->get();
      
      return view('user.mypage.mypage');
  }
}