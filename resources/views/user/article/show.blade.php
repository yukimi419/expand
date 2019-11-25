@extends('layouts.top')
@section('title', "{$article->title}-EXpang!!")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $article->created_at->format('Y年m月d日')}}
                        <br><br>
                        <h2>{{ $article->title }}</h2>
                        @if($article->genre == "music")
                            <a href="#" class="badge badge-primary align-middle genre">音楽</a>
                        @elseif($article->genre == "cinema")
                            <a href="#" class="badge badge-secondary align-middle genre">映画</a>
                        @elseif($article->genre == "anime")
                            <a href="#" class="badge badge-mazenta align-middle genre">アニメ</a>    
                        @elseif($article->genre == "game")
                            <a href="#" class="badge badge-success align-middle genre">ゲーム</a>
                        @elseif($article->genre == "comic")
                            <a href="#" class="badge badge-danger align-middle genre">漫画</a>
                        @elseif($article->genre == "food")
                            <a href="#" class="badge badge-warning align-middle genre">食べ物</a>
                        @elseif($article->genre == "store")
                            <a href="#" class="badge badge-info align-middle genre">お店</a>
                        @elseif($article->genre == "back")
                            <a href="#" class="badge badge-dark align-middle genre">裏ワザ</a>
                        @endif
                    </div>
                    <div class="card-body">
                        {!! $article->body !!}
                        <br>
                        <div class="text-right"><a href="{{ url('profile/'.$article->user->id) }}">{{ $article->user->name }}</a></div>
                    </div>

                </div>
                
            </div>    
        </div>
    </div>
@endsection