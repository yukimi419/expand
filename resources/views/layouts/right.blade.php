                <div class="card mob-p-article">
                    <div class="card-header">
                        <h5>新着記事</h5>    
                    </div>
                    <div class="card-body">
                        @foreach($posts as $post)
                            <div>
                                {{ $post->created_at->format('Y年m月d日') }}
                            </div>
                            <div class="mb-2">
                                <a href="{{ url('article/'.$post->id) }}" class="font-weight-bold ">{{ Str::limit($post->title, 100) }}</a>
                            </div>
                            @if($loop->iteration == 10)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card mob-p-article mt-3">
                    <div class="card-header">
                        <h5>月別アーカイブ</h5>    
                    </div>
                    <div class="card-body">
                        @foreach($years as $year => $data)
                            <div onclick="obj=document.getElementById('open{{ $year }}').style; obj.display=(obj.display=='none')?'block':'none';">
                                <a style="cursor:pointer;">▼{{ $year }} ({{ $yearCounts[$year] }})</a>
                            </div>
                            <div id="open{{ $year }}" style="display:none;clear:both;">
                                @foreach($months[$year] as $montly => $data)
                                    <div class="ml-4">
                                        <a href="{{ url('article/monthly/'.$user->id.'/'.$year.$montly) }}">{{ $montly }}月 ({{ $yearMonthCounts[$year.$montly] }})</a>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>