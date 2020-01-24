@extends('layouts.top')
@section('title', '-EXpang!!')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 top-new">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">音楽({{ $genre_like_counts['music'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">映画({{ $genre_like_counts['cinema'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item3-tab" data-toggle="tab" href="#item3" role="tab" aria-controls="item3" aria-selected="false">アニメ({{ $genre_like_counts['anime'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item4-tab" data-toggle="tab" href="#item4" role="tab" aria-controls="item4" aria-selected="false">ゲーム({{ $genre_like_counts['game'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item5-tab" data-toggle="tab" href="#item5" role="tab" aria-controls="item5" aria-selected="false">漫画({{ $genre_like_counts['comic'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item6-tab" data-toggle="tab" href="#item6" role="tab" aria-controls="item6" aria-selected="false">食べ物({{ $genre_like_counts['food'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item7-tab" data-toggle="tab" href="#item7" role="tab" aria-controls="item7" aria-selected="false">お店({{ $genre_like_counts['store'] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="item8-tab" data-toggle="tab" href="#item8" role="tab" aria-controls="item8" aria-selected="false">裏ワザ({{ $genre_like_counts['back'] }})</a>
                    </li>
                </ul>
            </div>
            
            <div class="tab-content col-md-12 top-new pt-3 shadow">
                        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'music')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'cinema')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'anime')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item4" role="tabpanel" aria-labelledby="item4-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'game')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item5" role="tabpanel" aria-labelledby="item5-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'comic')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item6" role="tabpanel" aria-labelledby="item6-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'food')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item7" role="tabpanel" aria-labelledby="item7-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'store')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="tab-pane fade" id="item8" role="tabpanel" aria-labelledby="item8-tab">
                            @foreach($likes as $like)
                                @if($like->Article->genre == 'back')
                                    <div class="clearfix">
                                        <div class="float-left ml-2 mr-2">
                                            @if($like->Article->image_path !== null)
                                                <img src="{{ $like->Article->image_path }}" class="top-image2">
                                            @else
                                                <img src="{{ asset('/img/images.png') }}" class="top-image2">
                                            @endif
                                        </div>
                                        <div>
                                            <h6>{{ $like->Article->created_at->format('Y年m月d日')}}</h6>
                                        </div>
                                        <div>
                                            <h5 class="align-middle title"><a class="text-reset text-decoration-none font-weight-bold" href="{{ url('article/'.$like->Article->id) }}">{{ Str::limit($like->Article->title, 60) }}</a></h5>
                                        </div>
                                        <div class="text-right title">
                                                <a href="{{ url('profile/'.$like->Article->user->id) }}" class="card-link">
                                                    @if($like->Article->user->image_path == 1)
                                                        <img src="{{$path}}{{$like->Article->user->id}}.jpg?{{time()}}" class="rounded-circle pc" width="30px" height="30px">
                                                    @else
                                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle pc" width="30px" height="30px">
                                                    @endif 
                                                    {{ $like->Article->user->name }}
                                                </a>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach        
                        </div>
            </div>
        </div>
    </div>
    

@endsection
