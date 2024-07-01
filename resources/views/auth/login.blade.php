@extends('layouts.auth')

@section('content')
    <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
            <a href="/" class="app-brand-link gap-2">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <!-- /Logo -->

        <div class="card-body mt-2">
            <h4 class="mb-2">Welcome to MCHOME 👋</h4>
            <p class="mb-4">Please sign-in to your account</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Enter your email or username" autofocus />
                    <label for="email">Email</label>
                </div>
                <div class="mb-3">
                    <div class="form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <label for="password">Password</label>
                            </div>
                            <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" />
                        <label class="form-check-label" for="remember"> Remember Me </label>
                    </div>
                    <a href="{{ asset('auth-forgot-password-basic.html') }}" class="float-end mb-1">
                        <span>Forgot Password?</span>
                    </a>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>

            <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                    <span>Create an account</span>
                </a>
            </p>
        </div>
    </div>
@endsection
