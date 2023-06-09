<link rel="stylesheet" href="/css/index.css" />
<nav x-data="{ open: false }" class="border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <a href="/" class="logo_link"><img src="{{ asset('img/logo_green.png') }}" alt="logo_header" class="logo_header"></a>
                    </a>
                </div>

                <!-- Navigation Links -->
                {{--
                    <x-nav-link href="index" :active="request()->routeIs('index')">
                        {{ __('Index') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                --}}
                @if (Auth::user()->admin)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                            {{ __('Menú') }}
                        </x-nav-link>
                        <x-nav-link :href="route('crearpizza')" :active="request()->routeIs('crearpizza')">
                            {{ __('Ingredientes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('promociones.index')" :active="request()->routeIs('promociones.index')">
                            {{ __('Promociones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                            {{ __('Reservas') }}
                        </x-nav-link>
                        <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                            {{ __('Clientes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('products.indexValoraciones')" :active="request()->routeIs('clientes.index')">
                            {{ __('Valoraciones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('products.indexComentarios')" :active="request()->routeIs('clientes.index')">
                            {{ __('Comentarios') }}
                        </x-nav-link>
                    </div>
                @else
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                            {{ __('Menú') }}
                        </x-nav-link>
                        <x-nav-link :href="route('promociones.index')" :active="request()->routeIs('promociones.index')">
                            {{ __('Promociones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                            {{ __('Reservas') }}
                        </x-nav-link>
                        <a href="{{ route('cart.list') }}" class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @if (Auth::user()->admin)
                                <div>{{ Auth::user()->name }} (Admin)</div>
                            @else
                                <div>{{ Auth::user()->name }}</div>
                            @endif

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="/recibos">
                            {{ __('Recibos') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="/curriculum">
                            {{ __('Currículum') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Tu cuenta') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @if (Auth::user()->admin)
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                    {{ __('Menú') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('crearpizza')" :active="request()->routeIs('crearpizza')">
                    {{ __('Ingredientes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('promociones.index')" :active="request()->routeIs('promociones.index')">
                    {{ __('Promociones') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                    {{ __('Reservas') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                    {{ __('Clientes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('products.indexValoraciones')" :active="request()->routeIs('clientes.index')">
                    {{ __('Valoraciones') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('products.indexComentarios')" :active="request()->routeIs('clientes.index')">
                    {{ __('Comentarios') }}
                </x-responsive-nav-link>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                    {{ __('Menú') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('promociones.index')" :active="request()->routeIs('promociones.index')">
                    {{ __('Promociones') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                    {{ __('Reservas') }}
                </x-responsive-nav-link>
                <a href="{{ route('cart.list') }}" class="flex items-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span>
                </a>
            </div>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @if (Auth::user()->admin)
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} (Admin)</div>
                @else
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                @endif
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="/recibos">
                    {{ __('Recibos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="/curriculum">
                    {{ __('Currículum') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Tu cuenta') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
