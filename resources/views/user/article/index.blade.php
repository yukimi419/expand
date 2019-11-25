@extends('layouts.top')
@section('title', '記事一覧-EXpang!!')

@section('content')
    <div class="container">
        <div class="row">
            <h2><i class="fas fa-book-open"></i> 記事一覧</h2>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ action('User\ArticleController@add') }}" role="button" class="btn btn-primary"><i class="fas fa-pen"></i> 新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('User\ArticleController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-search"></i> タイトル検索</div>
                            </div>
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                            <div class="input-group-append">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-11 mx-auto">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="table-light">
                                <th width="20%">作成日時</th>
                                <th width="30%">タイトル</th>
                                <th width="15%">ジャンル</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $article)
                                <tr class="table-light">
                                    <td class="align-middle">{{ $article->created_at }}</td>
                                    <td class="align-middle">
                                        <a href="{{ url('article/'.$article->id) }}" class="font-weight-bold ">{{ Str::limit($article->title, 100) }}</a>
                                        <br>
                                        <div class="index-body">{!! Str::limit(strip_tags($article->body),50) !!}</div>
                                    </td>
                                    @if($article->genre == "music")
                                        <td class="align-middle">音楽</td> 
                                    @elseif($article->genre == "cinema")
                                        <td class="align-middle">映画</td>
                                    @elseif($article->genre == "anime")
                                        <td class="align-middle">アニメ</td>    
                                    @elseif($article->genre == "game")
                                        <td class="align-middle">ゲーム</td>
                                    @elseif($article->genre == "comic")
                                        <td class="align-middle">漫画</td>
                                    @elseif($article->genre == "food")
                                        <td class="align-middle">食べ物</td>
                                    @elseif($article->genre == "store")
                                        <td class="align-middle">お店</td>
                                    @elseif($article->genre == "back")
                                        <td class="align-middle">裏ワザ</td>
                                    @endif
                                    <td class="text-center">
                                            <a href="{{ url('user/article/'.$article->id.'/edit') }}"><i class="fas fa-edit"></i> 編集</a>
                                            <br>
                                            @component('components.btn-del')
                                                @slot('controller', 'article')
                                                @slot('id', $article->id)
                                                @slot('name', $article->title)
                                            @endcomponent
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $posts->links() }}
    </div>
@endsection