<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

<nav class="text-white">
    <div class="container mx-auto px-4 md:flex flex-col items-start">
        <!-- Logo and Mobile menu icon -->
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center">
                <div class="md:hidden flex items-center mr-2">
                    <button type="button" class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-black">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    </button>
                </div>
                <a href="{{ url('/') }}" class="py-1 px-2 text-white font-bold">
                    <img src="{{ asset('images/carreservation.jpeg') }}" class="" alt="Logo"
                        style="width: 150px">
                </a>
            </div>
            @guest
                <div class="hidden md:flex items-center justify-end m-2">
                    <a href="{{ route('login') }}"
                        class="text-blue-950  text-xl no-underline border-b-2 border-red-500  hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  hover:no-underline rounded-lg  px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 12c2.485 0 4.5-2.015 4.5-4.5S14.485 3 12 3 7.5 5.015 7.5 7.5 9.515 12 12 12zm0 1.5c-3.055 0-5.5 2.445-5.5 5.5v.75c0 .825.675 1.5 1.5 1.5h8c.825 0 1.5-.675 1.5-1.5v-.75c0-3.055-2.445-5.5-5.5-5.5z" />
                        </svg>
                        Se connecter
                    </a>
                </div>
            @endguest
            @auth
                <div class="hidden md:flex items-center justify-end m-2 relative">

                    <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"
                        data-dropdown-trigger="hover"
                        class="flex text-xl text-blue-950  boder-b-4 border-red-500 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 profile "
                        type="button">
                        Bienvenue {{ Auth::user()->name }} </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDelay"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">

                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>

                        </ul>
                        @if (auth()->user()->role === 'admin')
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownUserAvatarButton">
                                <li>
                                    <a href="{{ route('admin') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">dashboard</a>
                                </li>

                            </ul>
                        @endif

                        <div class="py-2">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>

            @endauth
            @guest
                <div class="md:hidden flex items-center">
                    <a href="{{ route('login') }}"
                        class=" text-blue-950 text-xl border-b-4 border-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  hover:no-underline rounded-lg  inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>

            @endguest


        </div>

        <!-- Navigation Menu -->
        <div
            class="hidden md:flex md:flex-row flex-col items-center justify-start md:space-x-1 pb-1 md:pb-0 navigation-menu w-full desktop-menu text-blue-950">
            <a class="py-1 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('/') ? 'active' : '' }}"
                href="{{ url('/') }}">Reserver</a>
            {{-- <a class="py-1 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('suivre_son_colis') ? 'active' : '' }}"
                href="{{ url('suivre_son_colis') }}">Suivre mon bagage</a> --}}
            {{-- <a class="py-1 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('demande_de_devis') ? 'active' : '' }}"
                href="{{ url('demande_de_devis') }}">Air Bagages Plus</a> --}}
            <a class="py-1 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('client/espace_client') || request()->is('login') ? 'active' : '' }}"
                href="">Mon Compte Client</a>
            <a class="py-1 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('contact') ? 'active' : '' }}"
                href="{{ url('contact') }}">Nous contacter</a>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden flex-col items-start justify-start m-2  mt-10">
            <button class="close-button">&times;</button>

            <div class="mt-8 w-full">
                <a class="py-3 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('/') ? 'active' : '' }}"
                    href="{{ url('/') }}">Reserver</a>
                <a class="py-3 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('suivre_son_colis') ? 'active' : '' }}"
                    href="">Mon compte client</a>
                <a class="py-3 px-3 block no-underline font-bold rounded-sm hover:bg-blue-950 hover:text-white hover:no-underline hover:border-t-4 link {{ request()->is('contact') ? 'active' : '' }}"
                    href="{{ route('contact') }}">Nous contacter</a>

            </div>
        </div>
    </div>
</nav>


<div class="container menu">
    @yield('image_menu')
    <!-- <div class=" col-md-5 description">
            <h6 class="">@yield('description')

            </h6>
            <a href="">@yield('btn')</a>
        </div> -->
</div>

<!-- <script src="{{ asset('js/nav.js') }}"></script> -->
