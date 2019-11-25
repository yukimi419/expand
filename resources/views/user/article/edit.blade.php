@extends('layouts.article')
@section('title', '記事の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2><i class="fas fa-pen"></i> 記事の編集</h2>
                <br>
                <form action="{{ url('user/article/'.$article->id) }}" method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-lg-2" for="title">タイトル</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-lg-2" for="genre">ジャンル</label> 
                        <div class="col-lg-10">
                            <select class="form-control" name="genre">
                                <option value="{{ $article->genre }}">
                                @if($article->genre == "music")
                                    音楽
                                @elseif($article->genre == "cinema")
                                    映画
                                @elseif($article->genre == "anime")
                                    アニメ  
                                @elseif($article->genre == "game")
                                    ゲーム
                                @elseif($article->genre == "comic")
                                    漫画
                                @elseif($article->genre == "food")
                                    食べ物
                                @elseif($article->genre == "store")
                                    お店
                                @elseif($article->genre == "back")
                                    裏ワザ
                                @endif
                                </option>
                                <option value="music">音楽</option>
                                <option value="cinema">映画</option>
                                <option value="anime">アニメ</option>
                                <option value="game">ゲーム</option>
                                <option value="comic">漫画</option>
                                <option value="food">食べ物</option>
                                <option value="store">お店</option>
                                <option value="back">裏ワザ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2" for="body">本文</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="body" rows="20">{{ $article->body }}</textarea>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection