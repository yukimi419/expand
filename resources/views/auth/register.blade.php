@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-5 col-lg-4 col-form-label text-md-right"><span class="regi-red">※</span>{{ __('messages.Name') }}</label>

                            <div class="col-md-7 col-lg-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="エクパンで表示される名前になります">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-lg-4 col-form-label text-md-right"><span class="regi-red">※</span>{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-7 col-lg-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-lg-4 col-form-label text-md-right"><span class="regi-red">※</span>{{ __('messages.Password') }}</label>

                            <div class="col-md-7 col-lg-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="8文字以上のパスワードを設定してください">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-lg-4 col-form-label text-md-right"><span class="regi-red">※</span>{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-7 col-lg-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="確認の為もう1度パスワードを入力してください">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="twitter_id" class="col-md-5 col-lg-4 col-form-label text-md-right">Twitterアカウント</label>

                            <div class="col-md-7 col-lg-6">
                                <input id="twitter_id" type="text" class="form-control" name="twitter_id" value="{{ old('twitter_id') }}" autocomplete="twitter_id">
                            </div>
                        </div>
                        
                        <br>
                        <p><span class="regi-red">※</span><span class="regi-grey">は入力必須項目です。<br>メールアドレスとパスワード以外は後から編集できます。</span></p>
                        <div class="form-group row mb-0">
                            <div class="col-12 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
