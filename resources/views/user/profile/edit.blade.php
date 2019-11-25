@extends('layouts.top')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2><i class="fas fa-pen"></i> プロフィールの編集</h2>
                <br>
                <form action="{{ url('user/profile/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-lg-2" for="name">ニックネーム</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-lg-2" for="profile">自己紹介</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="profile" rows="20">{{ $user->profile }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-2" for="twitter_id">Twitterアカウント</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="twitter_id" value="{{ $user->twitter_id }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-2" for="photo">プロフィール画像</label> 
                        <div class="col-lg-10">
                            <input type="file" name="photo">
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection