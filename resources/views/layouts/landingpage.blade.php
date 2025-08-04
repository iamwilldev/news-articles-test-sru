
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <title>Modernize Bootstrap Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css') }}">

    <!-- Css -->
    @stack('styles')
</head>

<body>


<!-- Preloader -->
<div class="preloader">
    <img src="{{ asset('assets/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
</div>

<!-- ------------------------------------- -->
<!-- Header Start -->
<!-- ------------------------------------- -->
<header class="header-fp p-0 w-100">
    <nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10">
        <div class="custom-container d-flex align-items-center justify-content-between">
            <a href="{{ route('landingpage.index') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
{{--                <img src="{{ asset('assets/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />--}}
            </a>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="ti ti-menu-2 fs-8"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-4 py-2">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary px-4 py-2">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ------------------------------------- -->
<!-- Header End -->
<!-- ------------------------------------- -->

<!-- ------------------------------------- -->
<!-- Responsive Sidebar Start -->
<!-- ------------------------------------- -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <a href="{{ route('landingpage.index') }}">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" alt="Logo-light" />
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled ps-0 mb-0">
            <li class="mb-2">
                <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Sign In</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="btn btn-primary w-100">Sign Up</a>
            </li>
        </ul>
    </div>
</div>
<!-- ------------------------------------- -->
<!-- Responsive Sidebar End -->
<!-- ------------------------------------- -->

<div class="main-wrapper overflow-hidden">
    <!-- ------------------------------------- -->
    <!-- banner Start -->
    <!-- ------------------------------------- -->
    <section class="bg-primary-subtle py-14">
        <div class="container-fluid">
            <div class="text-center">
                <h1 class="fw-bolder fs-12"> News and Articles</h1>
            </div>
        </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- banner End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- List Start -->
    <!-- ------------------------------------- -->
    @yield('content')
    <!-- ------------------------------------- -->
    <!-- List End -->
    <!-- ------------------------------------- -->
</div>

<!-- ------------------------------------- -->
<!-- Footer Start -->
<!-- ------------------------------------- -->
<footer>
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
            <div class="d-flex gap-3 align-items-center">
                <img src="{{ asset('assets/images/logos/favicon.png') }}" alt="icon">
                <p class="fs-4 mb-0">All rights reserved by <a target="_blank" href="https://kai-dev.my.id/" class="text-primary link-primary">Kai</a></p>
            </div>
            <div>
                <p class="mb-0">Technical test by <a target="_blank" href="https://kai-dev.my.id/" class="text-primary link-primary">PT. Sinar Roda Utama</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- ------------------------------------- -->
<!-- Footer End -->
<!-- ------------------------------------- -->

<!-- Scroll Top -->
<a href="javascript:void(0)" class="top-btn btn btn-primary d-flex align-items-center justify-content-center round-54 p-0 rounded-circle">
    <i class="ti ti-arrow-up fs-7"></i>
</a>

<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<!-- Import Js Files -->
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
<script src="{{ asset('assets/js/theme/theme.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.min.js') }}"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/meg.init.js') }}"></script>
<script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/frontend-landingpage/homepage.js') }}"></script>

<!-- Scripts -->
@stack('scripts')
</body>

</html>
