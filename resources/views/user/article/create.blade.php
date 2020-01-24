@extends('layouts.article')
@section('title', '記事の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2><i class="fas fa-pen"></i> 記事を書く</h2>
                <hr>
                <br>
                <form action="{{ action('User\ArticleController@create') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif   
                    <div class="form-group row">
                        <label class="col-lg-2" for="title">タイトル</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control mobtext" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-2" for="genre">ジャンル</label> 
                        <div class="col-lg-10">
                            <select class="form-control mobtext" name="genre" required>
                                <option>▼項目を選択してください</option>
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
                            <textarea class="form-control mobtext" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-2" for="name">タグ</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control mobtext" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <p>※タグを複数設定する場合は半角スペースかカンマ(,)で区切ってください</p>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection