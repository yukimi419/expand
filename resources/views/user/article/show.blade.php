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
                        <div class="row">
                            <div class="col-3">
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
                            <div class="col-9">
                                <div class="text-right">
                                    <a href="{{ url('profile/'.$article->user->id) }}">
                                    @if ($is_image)
                                        <img src="{{$pathP}}?{{time()}}" class="rounded-circle" width="30px" height="30px">
                                    @else
                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle" width="30px" height="30px">
                                    @endif
                                    {{ $article->user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body body-size">
                        {!! $article->body !!}
                        <br>
                    </div>
                    <div>
                        @if (Auth::check())
                            @if ($like)
                              <!-- いいね取り消しフォーム -->
                              {{ Form::model($article, array('action' => array('LikesController@destroy', $article->id, $like->id))) }}
                                <button type="submit" class="like">
                                    <span class="heart">♥</span> {{ $article->likes_count }}
                                </button>
                              {!! Form::close() !!}
                            @else
                              <!-- いいねフォーム -->
                              {{ Form::model($article, array('action' => array('LikesController@store', $article->id))) }}
                                <button type="submit" class="like">
                                    <span class="heart">♡</span> {{ $article->likes_count }}
                                </button>
                              {!! Form::close() !!}
                            @endif
                        @else
                            <button type="submit" class="like">
                                <span class="heart">♡</span> {{ $article->likes_count }}
                            </button>
                        @endif
                    </div>
                    <div class="ml-2">
                        @if(count($article->Tags) > 0)
                            <ul class="list-inline">
                                @foreach($article->Tags as $tag)
                                    <li class="list-inline-item">
                                        <a href="{{ route('tags.article', ['id' => $tag->id]) }}">
                                            <span class="badge badge-pill badge-dark">
                                                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ $tag->name }}
                                            </span>
                                        </a>    
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.right')
            </div>
        </div>
    </div>
@endsection