<x-layouts.base>
    @php
        $routeName = request()->route()->getName();
    @endphp

    @if (in_array($routeName, [
            'static-sign-in',
            'static-sign-up',
            'register',
            'login',
            'password.forgot',
            'reset-password',
        ]))
        @if (in_array($routeName, ['static-sign-in', 'login', 'password.forgot', 'reset-password']))
            <main class="main-content mt-0">
                <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    {{ $slot }}
                </div>
            </main>
        @else
            {{ $slot }}
        @endif
    @elseif (in_array($routeName, ['rtl']))
        {{ $slot }}
    @elseif (in_array($routeName, ['virtual-reality']))
        <div class="virtual-reality">
            <x-navbars.navs.auth></x-navbars.navs.auth>
            <div class="border-radius-xl mx-2 mx-md-3 position-relative"
                style="background-image: url('{{ asset('assets') }}/img/vr-bg.jpg'); background-size: cover;">
                <x-navbars.sidebar></x-navbars.sidebar>
                <main class="main-content border-radius-lg h-100">
                    {{ $slot }}
                </main>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
        <x-plugins></x-plugins>
    @else
        @if (in_array($routeName, [
                'dashboard',
                'data-jemaat',
                'data-jemaat-create',
                'data-jemaat-show',
                'data-jemaat-edit',
                'pendataan-baptis',
                'pendataan-sidi',
                'pendataan-menikah',
                'pendataan-menikah-show',
                'pendataan-kematian',
                'laporan'
            ]))
            <x-navbars.sidebar></x-navbars.sidebar>
        @endif
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth></x-navbars.navs.auth>

            @if (in_array($routeName, [
                    'data-jemaat',
                    'data-jemaat-create',
                    'data-jemaat-show',
                    'data-jemaat-edit',
                    'pendataan-baptis',
                    'pendataan-sidi',
                    'pendataan-menikah',
                    'pendataan-menikah-show',
                    'pendataan-kematian',
                    'laporan',
                    'profil',
                    'pendaftaran-baptis',
                    'pendaftaran-sidi',
                    'pendaftaran-menikah',
                ]))
                @yield('content')
            @else
                {{ $slot }}
            @endif
        </main>
        <x-plugins></x-plugins>
    @endif
</x-layouts.base>
