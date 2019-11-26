@extends('layouts.top')



@section('title', 'EXpang!!-エクパン-')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-11 mx-auto top-new">
                <br>
                <h3>新着記事</h3>
                <div class="row">
                    @foreach($articles as $article)
                    <div class="card col-md-4 border-bottom-0">
                        <div class="card-body">
                            <h6>{{ $article->created_at->format('Y年m月d日')}}</h6>
                            @if($article->image_path !== null)
                                <img src="{{ $article->image_path }}" class="top-image">
                            @else
                                <img src="{{ asset('/img/images.png') }}" class="top-image">
                            @endif
                            <a href="{{ url('article/'.$article->id) }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                            @if($article->genre == "music")
                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-primary align-middle">音楽</a><br> 
                            @elseif($article->genre == "cinema")
                                <a href="#" class="badge badge-secondary align-middle">映画</a><br>
                            @elseif($article->genre == "anime")
                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-mazenta align-middle">アニメ</a><br>    
                            @elseif($article->genre == "game")
                                <a href="#" class="badge badge-success align-middle">ゲーム</a><br>
                            @elseif($article->genre == "comic")
                                <a href="#" class="badge badge-danger align-middle">漫画</a><br>
                            @elseif($article->genre == "food")
                                <a href="#" class="badge badge-warning align-middle">食べ物</a><br>
                            @elseif($article->genre == "store")
                                <a href="#" class="badge badge-info align-middle">お店</a><br>
                            @elseif($article->genre == "back")
                                <a href="#" class="badge badge-dark align-middle">裏ワザ</a><br>
                            @endif
                            <a href="{{ url('profile/'.$article->user->id) }}" class="card-link">{{ $article->user->name }}</a>
                        </div>
                    </div>
                    @if($loop->iteration == 6)
                        @break
                    @endif
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection