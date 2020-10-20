@extends('admin.layouts.auth')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Acesseu sua conta') }}</div>
    
    <div class="card-body  pb-0">

        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has($msg))
        
                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                @endif
            @endforeach
        </div>
        
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label> --}}

                {{-- <div class="col-md-6"> --}}
                    <input placeholder="{{ __('E-mail') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                {{-- </div> --}}
            </div>

            <div class="form-group">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                <div class="col-md-6"> --}}
                    <input placeholder="{{ __('Senha') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                {{-- </div> --}}
            </div>

            <div class="form-group">
                {{-- <div class="col-md-6 offset-md-4"> --}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Manter Logado') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group  mb-0 p-3">
                {{-- <div class="col-md-8 offset-md-4"> --}}
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                {{-- </div> --}}
            </div>
        </form>
    </div>
</div>

@endsection
