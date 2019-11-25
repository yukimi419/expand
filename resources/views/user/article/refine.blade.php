@extends('layouts.top')
@section('title', '-EXpang!!')

@section('content')
    <div class="container">
        <div class="row">
            <h2><i class="fas fa-book-open"></i> 記事一覧</h2>
        </div>
        <hr>
        <br>
       
        <div class="row">
            <div class="list-news col-11 mx-auto">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="table-light">
                                <th width="20%">作成日時</th>
                                <th width="30%">タイトル</th>
                                <th width="15%">投稿者</th>
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
                                    <td>
                                        <a href="{{ url('profile/'.$article->user->id) }}">{{ $article->user->name }}</a>    
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