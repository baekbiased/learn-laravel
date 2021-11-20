@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">Register</h1>
        <p class="lead">
            Start creating the best possible user experience for you customers.
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="m-sm-4">

                <form method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            class="form-control @error('name') is-invalid @enderror"
                            type="text"
                            name="name"
                            placeholder="Enter your name"
                            value="{{old('name')}}"
                        />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            class="form-control @error('email') is-invalid @enderror"
                            type="email"
                            name="email"
                            placeholder="Enter your email"
                            value="{{old('email')}}"

                        />
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Password</label>
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

                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                        />
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

{{--                    <x-input type="text" label="Name" placeholder="Enter your name"></x-input>--}}

{{--                    <x-input type="email" label="Email" placeholder="Enter your email"></x-input>--}}

{{--                    <x-input type="password" label="Password" placeholder="Enter your password"></x-input>--}}

{{--                    <x-input type="password" label="Confirm Password" name="password_confirmation" placeholder="Enter your password again"></x-input>--}}

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
