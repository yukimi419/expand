@extends('layouts.top')
@section('title', 'エクパンて何？')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>エクパンてなにができるの？</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-8 col-8 balloon2">
                <p>エクパンはオススメされてるものを探したり自分がオススメなものを紹介することができるサービスなんだよ！</p>
            </div>
             <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <img class="img-fluid" src="{{ asset('/img/infoicon.png') }}"></img>
            </div>
        </div>
        
    </div>
@endsection