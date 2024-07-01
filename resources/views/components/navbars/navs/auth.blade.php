<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        @if (Auth::user()->role == 'Admin')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                        {{ str_replace('-', ' ', Route::currentRouteName()) }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0 text-capitalize">
                    {{ str_replace('-', ' ', Route::currentRouteName()) }}</h6>
            </nav>
        @endif
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            @if (Auth::user()->role == 'Jemaat')
                <ul class="navbar-nav mx-3">
                    <li class="nav-item me-3 {{ request()->routeIs('profil') ? 'active' : '' }}">
                        <a href="{{ route('profil') }}"
                            class="nav-link text-body font-weight-bold px-0 fs-6 {{ request()->routeIs('profil') ? 'active' : '' }}">
                            <i class="fa fa-user me-sm-1"></i>
                            Profil Saya
                        </a>
                    </li>
                    <li class="nav-item me-3 {{ request()->routeIs('pendaftaran-baptis') ? 'active' : '' }}">
                        <a href="{{ route('pendaftaran-baptis') }}"
                            class="nav-link text-body font-weight-bold px-0 fs-6 {{ request()->routeIs('pendaftaran-baptis') ? 'active' : '' }}">
                            <i class="fa fa-tint me-sm-1"></i>
                            Pendaftaran Baptis
                        </a>
                    </li>
                    <li class="nav-item me-3 {{ request()->routeIs('pendaftaran-sidi') ? 'active' : '' }}">
                        <a href="{{ route('pendaftaran-sidi') }}"
                            class="nav-link text-body font-weight-bold px-0 fs-6 {{ request()->routeIs('pendaftaran-sidi') ? 'active' : '' }}">
                            <i class="fa fa-check me-sm-1"></i>
                            Pendaftaran Sidi
                        </a>
                    </li>
                    <li class="nav-item me-3 {{ request()->routeIs('pendaftaran-menikah') ? 'active' : '' }}">
                        <a href="{{ route('pendaftaran-menikah') }}"
                            class="nav-link text-body font-weight-bold px-0 fs-6 {{ request()->routeIs('pendaftaran-menikah') ? 'active' : '' }}">
                            <i class="fa fa-heart me-sm-1"></i>
                            Pendaftaran Menikah
                        </a>
                    </li>
                </ul>
            @endif

            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0 fs-6">
                        <i class="fa fa-sign-out-alt me-sm-1"></i>
                        <livewire:auth.logout />
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .nav-link.active {
        color: blue !important;
    }
</style>
