@extends('admin.auth.layout')
@section('title','Iniciar Sesión')
@section('content')
    <div class="card">
        <div class="row align-items-center text-center">
            <div class="col-md-12">
                <div class="card-body">
{{--                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="" class="img-fluid mb-4">--}}
                    <h4 class="mb-3 f-w-400">Iniciar Sesión</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="floating-label" for="Email">Correo</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" placeholder="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="Password">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck1">Mantener sesión activa.</label>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mb-4">Entrar</button>
                        <p class="mb-2 text-muted"><a href="auth-reset-password.html" class="f-w-400">¿Olvidó su contraseña?</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
