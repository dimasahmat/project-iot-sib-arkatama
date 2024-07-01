@extends('layouts.auth')

@section('content')
    <!-- Register Card -->
    <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
            <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <div class="card-body mt-2">
            <h4 class="mb-4">Register</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        autofocus />
                    <label for="username">Name</label>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Enter your email" />
                    <label for="email">Email</label>
                </div>
                <div class="mb-3 form-password-toggle">
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
                <div class="mb-3 form-password-toggle">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <label for="password">Password Confirmation</label>
                        </div>
                        <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span>Sign in instead</span>
                </a>
            </p>
        </div>
    </div>
    <!-- Register Card -->
@endsection
