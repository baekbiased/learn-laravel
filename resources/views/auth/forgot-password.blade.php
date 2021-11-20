@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
    @if(session('status'))

        <x-alert type="success">{{ session('status') }}</x-alert>

    @endif

    @if(session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif
    <div class="text-center mt-4">
        <h1 class="h2">Reset password</h1>
        <p class="lead">
            Enter your email to reset your password.
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">


                <form method="post" action="{{ route('password.email') }}">
                    @csrf

                    <input name="email" type="email" label="Email" placeholder="Enter your email"></input>

                    <div class="text-center mt-3">
                        <button
                            type="submit"
                            class="btn btn-lg btn-primary"
                        >
                            Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
