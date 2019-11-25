@extends('layouts.top')
@section('title', '{{ Auth::user()->name }}のマイページ')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-12">
                        <a href="">記事作成</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                
            </div>
                
        </div>
        
    </div>
@endsection