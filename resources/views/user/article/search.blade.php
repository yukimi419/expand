@extends('layouts.top')
@section('title', '-EXpang!!')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-11 mx-auto top-new">
                <br>
                @if($search_article != null)
                    <h4>{{ $search_article }}で検索</4>
                @else
                    <h4>記事一覧</h4>
                @endif
                <div class="row">
                    @foreach($posts as $article)
                            <div class="col-md-12 border-bottom-0">
                                <hr>
                                <div class="clearfix">
                                    <div class="float-left ml-2 mr-2">
                                        @if($article->image_path !== null)
                                            <img src="{{ $article->image_path }}" class="top-image2">
                                        @else
                                            <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                        @endif
                                    </div>
                                    <div>
                                        <h6>{{ $article->created_at->format('Y年m月d日')}}</h6>
                                    </div>
                                    <div class="mb-2 mt-n2">
                                        @if($article->genre == "music")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-primary align-middle">音楽</a><br> 
                                        @elseif($article->genre == "cinema")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-secondary align-middle">映画</a><br>
                                        @elseif($article->genre == "anime")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-mazenta align-middle">アニメ</a><br>    
                                        @elseif($article->genre == "game")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-success align-middle">ゲーム</a><br>
                                        @elseif($article->genre == "comic")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-danger align-middle">漫画</a><br>
                                        @elseif($article->genre == "food")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-warning align-middle">食べ物</a><br>
                                        @elseif($article->genre == "store")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-info align-middle genre-top">お店</a><br>
                                        @elseif($article->genre == "back")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-dark align-middle genre-top">裏ワザ</a><br>
                                        @endif
                                    </div>
                                    <div>
                                        <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$article->id) }}">{{ Str::limit($article->title, 60) }}</a></h5>
                                    </div>
                                    <div class="text-right title">
                                            <a href="{{ url('profile/'.$article->user->id) }}" class="card-link">
                                                @if($article->user->image_path == 1)
                                                    <img src="{{$path}}{{$article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                @else
                                                    <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                @endif 
                                                {{ $article->user->name }}
                                            </a>
                                    </div>
                                </div>
                            </div>                        
                    @endforeach
                </div>
                
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="mt-3 ">
            {{ $posts->links() }}
        </div>
    </div>
@endsection