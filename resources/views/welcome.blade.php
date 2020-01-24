@extends('layouts.top')



@section('title', 'EXpang!!-エクパン-')


@section('content')
    <div class="container">
        <div class="row pc">
            <div class="col-md-9 col-11 mx-auto top-new shadow">
                <br>
                <h3>新着記事</h3>
                <div class="row">
                    <?php $bigCount = 0 ?>
                    @foreach($articles as $article)
                        @if($bigCount <= 5)
                            <div class="card col-md-6 border-bottom-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>{{ $article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            @if($article->genre == "music")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-primary align-middle genre-top">音楽</a><br> 
                                            @elseif($article->genre == "cinema")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-secondary align-middle genre-top">映画</a><br>
                                            @elseif($article->genre == "anime")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-mazenta align-middle genre-top">アニメ</a><br>    
                                            @elseif($article->genre == "game")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-success align-middle genre-top">ゲーム</a><br>
                                            @elseif($article->genre == "comic")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-danger align-middle genre-top">漫画</a><br>
                                            @elseif($article->genre == "food")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-warning align-middle genre-top">食べ物</a><br>
                                            @elseif($article->genre == "store")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-info align-middle genre-top">お店</a><br>
                                            @elseif($article->genre == "back")
                                                <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-dark align-middle genre-top">裏ワザ</a><br>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            @if($article->image_path !== null)
                                                <img src="{{ $article->image_path }}" class="top-image mob-image">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image mob-image">
                                            @endif
                                        </div>
                                        <div class="col-md-12 mt-2 mb-2 t-height">
                                            <h4 class="card-title align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$article->id) }}">{{ Str::limit($article->title, 60) }}</a></h4>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <a href="{{ url('profile/'.$article->user->id) }}" class="card-link">
                                                @if($article->user->image_path == 1)
                                                    <img src="{{$path}}{{$article->user->id}}.jpg?{{time()}}" class="rounded-circle" width="30px" height="30px">
                                                @else
                                                    <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle" width="30px" height="30px">
                                                @endif 
                                                {{ $article->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $bigCount += 1 ?>
                        @else
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
                                    <div class="mb-2">
                                        @if($article->genre == "music")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-primary align-middle genre-top">音楽</a><br> 
                                        @elseif($article->genre == "cinema")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-secondary align-middle genre-top">映画</a><br>
                                        @elseif($article->genre == "anime")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-mazenta align-middle genre-top">アニメ</a><br>    
                                        @elseif($article->genre == "game")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-success align-middle genre-top">ゲーム</a><br>
                                        @elseif($article->genre == "comic")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-danger align-middle genre-top">漫画</a><br>
                                        @elseif($article->genre == "food")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-warning align-middle genre-top">食べ物</a><br>
                                        @elseif($article->genre == "store")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-info align-middle genre-top">お店</a><br>
                                        @elseif($article->genre == "back")
                                            <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-dark align-middle genre-top">裏ワザ</a><br>
                                        @endif
                                    </div>
                                    <div>
                                        <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$article->id) }}">{{ Str::limit($article->title, 60) }}</a></h5>
                                    </div>
                                    <div class="text-right">
                                            <a href="{{ url('profile/'.$article->user->id) }}" class="card-link">
                                                @if($article->user->image_path == 1)
                                                    <img src="{{$path}}{{$article->user->id}}.jpg?{{time()}}" class="rounded-circle" width="30px" height="30px">
                                                @else
                                                    <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle" width="30px" height="30px">
                                                @endif 
                                                {{ $article->user->name }}
                                            </a>
                                      </div>
                                </div>
                            </div>    
                        @endif
                        @if($loop->iteration == 12)
                            @break
                        @endif
                    @endforeach
                </div>
                <br>
            </div>
            
            <div class="col-md-3">
                
            </div>
        </div>
        
        <div class="row mob">
            <div class="col-sm-12 col-11 mx-auto mob-w">
                <br>
                <h5 class="ml-2">新着記事</h5>
                <div>
                    @foreach($articles as $article)
                        <div class="border-bottom-0">
                                <hr>
                                <div class="mob-d ml-2 mr-2">
                                    @if($article->image_path !== null)
                                        <img src="{{ $article->image_path }}" class="mob-image">
                                    @else
                                        <img src="{{ asset('/img/images.png') }}" class="mob-image">
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mob-day" >{{ $article->created_at->format('Y年m月d日')}}</h6>
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
                                        <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-info align-middle">お店</a><br>
                                    @elseif($article->genre == "back")
                                        <a href="{{ url('article/genre/'.$article->genre) }}" class="badge badge-dark align-middle">裏ワザ</a><br>
                                    @endif
                                </div>
                                <div class="mt-n1">
                                    <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$article->id) }}">{{ Str::limit($article->title, 60) }}</a></h5>
                                </div>
                                <div class="text-right mt-n2 title">
                                    <a href="{{ url('profile/'.$article->user->id) }}">{{ $article->user->name }}</a>
                                </div>
                                <span class="mob-c"></span>
                        </div>
                        @if($loop->iteration == 12)
                            @break
                        @endif
                    @endforeach
                    <br>
                </div>
            </div>    
        </div>
        
        <div class="row">
            <div class="col-sm-12 col-11 mx-auto top-new mt-4 pb-4">
                <br>
                <h3>新着タグ</h3>
                <div>
                    @foreach($tags as $tag)
                        <li class="list-inline-item">
                            <a href="{{ route('tags.article', ['id' => $tag->id]) }}">
                                <span class="badge badge-pill badge-dark">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ Str::limit($tag->name, 60) }}
                                </span>
                            </a>    
                        </li>
                    @if($loop->iteration == 30)
                        @break
                    @endif    
                    @endforeach
                </div>
            </div>
        </div>
        
        
        
    </div>
@endsection