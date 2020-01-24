@extends('layouts.top')
@section('title', "{$user->name}-EXpang!!")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($is_image)
                            <img src="{{$pathP}}?{{time()}}" width="100px" height="100px">
                        @else
                            <img src="{{ asset('/img/noimage.jpg') }}" width="100px" height="100px">
                        @endif
                        <h3>{{ $user->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <span class="font-weight-bold">プロフィール</span>
                            <hr class="mt-n1">
                            <div class="ml-4">
                                {{ $user->profile }}
                            </div>
                        </div>
                        <br>
                        <div>
                            <span class="font-weight-bold">投稿記事数</span>
                            <hr class="mt-n1">
                            <div class="ml-4">
                                {{ $count }}記事
                            </div>
                        </div>
                        <br>
                        <div>
                            <span class="font-weight-bold">獲得<span class="heart02">♥</span>数</span>
                            <hr class="mt-n1">
                            <div class="ml-4">
                                <span class="heart02">♥</span>{{ $total }}
                            </div>
                        </div>
                        <br>
                        <div>
                            <span class="font-weight-bold">投稿ジャンル傾向</span>
                            <hr class="mt-n1">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4">
                @include('layouts.right')
            </div>
        </div>
    </div>
    
    <script>
    	var ctx = document.getElementById('myChart').getContext('2d');
    	var chart = new Chart(ctx, {
    		type: 'radar',
    		data: {
    			labels: ['音楽', '映画', 'アニメ', 'ゲーム', '漫画', '食べ物', 'お店', '裏ワザ'],
    			datasets: [{
    				label: 'ジャンル',
    				data: [{{ $genre_counts['music'] }}, {{ $genre_counts['cinema'] }}, {{ $genre_counts['anime'] }}, {{ $genre_counts['game'] }}, {{ $genre_counts['comic'] }}, {{ $genre_counts['food'] }}, {{ $genre_counts['store'] }}, {{ $genre_counts['back'] }}],
    				backgroundColor: 'rgba(255, 99, 132, 0.3)',
    				borderColor: 'rgba(255, 99, 132, 0.3)'
    			}]
    		},
    		options: {
    		    scale:{
                    ticks:{
                      suggestedMin: 0,
                      stepSize: 1,
                    }
                }
    		}
    	});
    </script>
@endsection