<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\User;
use App\Like;
use App\Tag;
use Storage;

class ArticleController extends Controller
{
    public function add()
  {
      $path = JobController::path();
      return view('user.article.create',['path' => $path]);
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
      
      $tag_names = preg_split('/[,\s+]/', $request->name, -1, PREG_SPLIT_NO_EMPTY);
        $tag_ids = [];
        foreach ($tag_names as $tag_name) {
            $tag = Tag::firstOrCreate([
                'name' => $tag_name,
            ]);
            $tag_ids[] = $tag->id;
        }
 
      $article->Tags()->sync($tag_ids);
      
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
      
      $path = JobController::path();
      
      return view('user.article.index', compact('posts', 'cond_title', 'path'));
  }
  
  public function edit(Article $article)
  {
      $this->authorize('edit', $article);
      
      $path = JobController::path();
      
      $tag_list = Tag::pluck('name', 'id');
      
      return view('user.article.edit', compact('article', 'path', 'tag_list'));
  }
  
  public function update(ArticleRequest $request,Article $article)
  {
      if($request->update == true){
          
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
          
          $tag_names = preg_split('/[,\s+]/', $request->name, -1, PREG_SPLIT_NO_EMPTY);
            $tag_ids = [];
            foreach ($tag_names as $tag_name) {
                $tag = Tag::firstOrCreate([
                    'name' => $tag_name,
                ]);
                $tag_ids[] = $tag->id;
            }
     
          $article->Tags()->syncWithoutDetaching($tag_ids);
    
          return redirect('user/article/index')->with('message', '記事を更新しました。');
      }elseif($request->tagd == true){
          
          
          if($request->tagc == true){
              $tagd_id = $request->tagc;
              
              $article->Tags()->detach($tagd_id);
              
              return redirect()
                 ->action('User\ArticleController@edit', $article->id)->with('message', 'タグを削除しました。');
          }else{
              return redirect()
                 ->action('User\ArticleController@edit', $article->id)->with('message', '削除するタグがチェックされていません。');
          }
      }

  }
  
  public function show(Article $article) 
  {
        
        $is_image = false;
        $pathP = Storage::disk('s3')->url('profile_images/' . $article->user->id . '.jpg');
        if (Storage::disk('s3')->exists('/profile_images/' . $article->user->id . '.jpg')) {
            $is_image = true;
        }
        
        if(Auth::check()){
            $like = $article->likes()->where('user_id', Auth::user()->id)->first();
            
        }else{
            $like = null;
        }
        
        $user = $article->user;
        
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
        
        $path = JobController::path();
        
        return view('user.article.show', compact('article', 'like', 'path', 'pathP', 'is_image', 'user', 'posts', 'years', 'months', 'yearCounts', 'yearMonthCounts'));
  }
  
  public function genre($genre) 
  {
        $posts = Article::where('genre', $genre)->latest('created_at')->paginate(10);
        
        if($genre == 'music'){
            $genre_name = '音楽';    
        }elseif($genre == 'cinema'){
            $genre_name = '映画'; 
        }elseif($genre == 'anime'){
            $genre_name = 'アニメ';
        }elseif($genre == 'game'){
            $genre_name = 'ゲーム';
        }elseif($genre == 'comic'){
            $genre_name = '漫画';
        }elseif($genre == 'food'){
            $genre_name = '食べ物';
        }elseif($genre == 'store'){
            $genre_name = 'お店';
        }elseif($genre == 'back'){
            $genre_name = '裏ワザ';
        }
        
        $path = JobController::path();
        
        return view('user.article.refine', compact('posts', 'genre_name', 'path'));
  }
  
  public function destroy(Article $article)
  {
        $this->authorize('edit', $article);
        $article->delete();
        return redirect('user/article/index')->with('message', '記事を削除しました。');
  }
  
  public function showByTag($id)
  {
        $posts = Tag::find($id)->articles()->latest('created_at')->paginate(10);
        
        $tag_name = Tag::find($id)->name;
        
        $path = JobController::path();
 
        return view('user.article.tag', compact('posts', 'tag_name', 'path'));
  }
  
  public function search(Request $request)
  {
      $search_article = $request->search_article;
      
      $posts = Article::where('body','LIKE',"%{$search_article}%")->latest('created_at')->paginate(10);
      
      $path = JobController::path();
      
      return view('user.article.search', compact('posts', 'search_article', 'path'));
  }
  
  public function monthly(User $user, $monthly)
  {
      
        $posts = User::find($user->id)->articls()->latest('created_at')->get();
        
        $years = User::find($user->id)->articls()->orderBy('created_at')->get()->groupBy(function ($row) {
                    return $row->created_at->format('Y');
                 });
      
        $yearMonths = User::find($user->id)->articls()->orderBy('created_at')->get()->groupBy(function ($row) {
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
        
        $year_name = substr($monthly,0,4);
        
        $month_name = substr($monthly,4);
        
        if(substr($month_name,0,1) == '0'){
            $month_name = substr($month_name,1);
        }
                        
        $month_posts = $yearMonths[$monthly];
        
                 
        $path = JobController::path();        
                 
        return view('user.article.monthly', compact('month_posts', 'path', 'year_name', 'month_name', 'user', 'posts', 'years', 'months', 'yearCounts', 'yearMonthCounts'));         
  }
  
  public function likes(User $user){
        
        $this->authorize('edit', $user);
        
        $likes = Like::where('user_id', $user->id)->with('Article')->get();
        
        $like_genres = $likes->groupBy(function ($row) {
                        return $row->Article->genre;
                        });
        
        $genre_like_counts = [];
        
        $genre_like_counts['music'] = 0;
        $genre_like_counts['cinema'] = 0;
        $genre_like_counts['anime'] = 0;
        $genre_like_counts['game'] = 0;
        $genre_like_counts['comic'] = 0;
        $genre_like_counts['food'] = 0;
        $genre_like_counts['store'] = 0;
        $genre_like_counts['back'] = 0;
                        
        foreach($like_genres as $like_genre => $data){
            $genre_like_counts[$like_genre] = $data->count();
        }
        
        $path = JobController::path(); 
        
        return view('user.article.likes', compact('path','likes','genre_like_counts'));    
  }

}