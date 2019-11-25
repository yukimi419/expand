@extends('layouts.top')
@section('title', "{$user->name}-EXpang!!")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($is_image)
                            <img src="/storage/profile_images/{{ $user->id }}.jpg" width="100px" height="100px">
                        @endif
                        <h2>{{ $user->name}}</h2>
                    </div>
                    <div class="card-body">
                        {{ $user->profile }}
                    </div>

                </div>
                
            </div>    
        </div>
    </div>
@endsection