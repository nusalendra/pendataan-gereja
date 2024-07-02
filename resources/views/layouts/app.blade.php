<x-layouts.base>
    @php
        $routeName = request()->route()->getName();
    @endphp

    @if (in_array($routeName, [
            'login',
        ]))
        @if (in_array($routeName, ['login']))
            <main class="main-content mt-0">
                <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    {{ $slot }}
                </div>
            </main>
        @else
            {{ $slot }}
        @endif
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
                'laporan',
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
    @endif
</x-layouts.base>
