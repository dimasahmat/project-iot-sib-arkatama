<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    @include('layouts.dashboard._head')
</head>

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                @yield('content')

                <img src="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}"
                    class="authentication-image d-none d-lg-block" alt="triangle-bg"
                    data-app-light-img="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}"
                    data-app-dark-img="{{ asset('assets/img/illustrations/auth-basic-mask-dark.png') }}" />
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    @include('layouts.dashboard._foot')
</body>

</html>
