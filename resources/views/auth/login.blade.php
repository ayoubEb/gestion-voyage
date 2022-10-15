@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div @class('container-fluid') id="authen">
  <div @class(['row','justify-content-center','w-100'])>
    <div @class(['col-lg-4'])>
      <div @class('card')>
        <div @class(['card-body','p-4'])>
          <div @class('mb-4')>
            <h4 @class(['text-center','fw-bolder','mb-2'])>
              Bienvenue
            </h4>
            <p @class('text-center')>Connectez-vous à votre compte pour continuer</p>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div @class(['form-group','mb-3'])>
              <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div @class(['form-group','mb-2'])>
              <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div @class(['form-check','mb-2'])>
              <input type="checkbox" name="" id="show" @class('form-check-input') onclick="showPwd();">
              <label for="show" @class('form-check-label')>Afficher le mot de passe</label>
            </div>
            <button type="submit" @class(['btn','btn-primary','w-100'])>Connexion</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  function showPwd(){
    var pwd = document.getElementById('password');
    if(pwd.type==="password"){
      pwd.type="text";
    }
    else{
      pwd.type="password";
    }
  }
</script>
@endsection
