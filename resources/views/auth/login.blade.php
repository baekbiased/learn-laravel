@extends('layouts.auth')

@section('title', 'Login')

@section('content')


    @if(session('status'))
        <x-alert type="success">{{ session('status') }}</x-alert>
    @endif

    @if(session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    <div class="text-center mt-4">
        <h1 class="h2">Login</h1>
        <p class="lead">
            Login to your account to continue
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            class="form-control @error('email') is-invalid @enderror"
                            type="email"
                            name="email"
                            placeholder="Enter your email"
                            value="{{old ('email')}}"
                        />
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            class="form-control @error('password') is-invalid @enderror"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                        />
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <small>
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </small>

                    </div>



                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input" name="remember" checked>
                        <span class="custom-control-label">Remember me next time</span>
                    </label>

                    <div class="text-center mt-3">
                        <button
                            type="submit"
                            class="btn btn-lg btn-primary"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
