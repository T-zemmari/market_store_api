<nav class="w-full bg-white border-gray-200 fixed">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/assets/logos/logo_1.png') }}" class="h-8" alt="marketstore Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">MarketStore</span>
        </a>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent {{ request()->route()->named('home') ? 'md:text-blue-700' : 'md:text-black' }} md:hover:text-blue-700  md:p-0 "
                        aria-current="{{ request()->route()->named('home') ? 'page' : '' }} ">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        aria-current="{{ request()->route()->named('about') ? 'page' : '' }} "
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent {{ request()->route()->named('about') ? 'md:text-blue-700' : 'md:text-black' }} md:hover:text-blue-700 md:p-0">
                        Acerca de
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}"
                        aria-current="{{ request()->route()->named('contact') ? 'page' : '' }} "
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent {{ request()->route()->named('contact') ? 'md:text-blue-700' : 'md:text-black' }} md:hover:text-blue-700 md:p-0">
                        Contacto
                    </a>
                </li>
                <li>
                    <a href="{{ route('documentacion') }}"
                        aria-current="{{ request()->route()->named('about') ? 'page' : '' }} "
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent {{ request()->route()->named('documentacion') ? 'md:text-blue-700' : 'md:text-black' }} md:hover:text-blue-700 md:p-0">
                        Api-doc
                    </a>
                </li>
                <li>
                    @if (!Auth::check())
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Entrar
                        </a>
                    @else
                        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 sm:-mt-1"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{asset('/assets/imgs/admin_1.png')}}"
                                    alt="user photo">
                            </button>
                            <!-- Dropdown menu -->
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                                id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900">{{$user->name??''}}</span>
                                    <span
                                        class="block text-sm  text-gray-500 truncate">{{$user->email??''}}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li>
                                        <a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Panel de administración
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Mi perfil
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Salir') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <button data-collapse-toggle="navbar-user" type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                aria-controls="navbar-user" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
