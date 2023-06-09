<link rel="stylesheet" href="/css/index.css" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('PIZZERÍA BRENDA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="logo_div">
                        <img src="{{ asset('img/logo.png') }}" alt="pizzeria_brenda" class="logo">
                    </div>
                    {{ __("PLATOS") }}
                    <br>
                    @foreach ($platos as $plato)
                        <br>
                        <img src="{{ asset($plato->foto) }}" alt="foto">
                        <br>
                        <p>{{ $plato->nombre_plato }}</p>
                        <p>{{ $plato->id }}</p>
                        <p>{{ $plato->disponibilidad }}</p>
                        <br>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $plato->id }}" name="id">
                            <input type="hidden" value="{{ $plato->nombre_plato }}" name="nombre_plato">
                            <input type="hidden" value="{{ $plato->precio }}" name="precio">
                            <input type="hidden" value="{{ $plato->foto }}"  name="foto">
                            <input type="hidden" value="1" name="cantidad">
                            <button class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">Add To Cart</button>
                        </form>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer
        class="fixed bottom-0 left-0 z-20 w-full p-4 border-t border-gray-300 shadow md:flex md:items-center md:justify-between md:p-6" style="background-color:white;">
        <span class="text-sm text-gray-500 sm:text-center">{{__('© 2023 Pizzería Brenda™. Todos los derechos reservados.')}}
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
            <li>
                <a href="{{ route('whoarewe') }}" class="mr-4 hover:underline md:mr-6">{{__('¿Quiénes somos?')}}</a>
            </li>
            <li>
                <a href="{{ route('faq') }}" class="mr-4 hover:underline md:mr-6">{{__('Preguntas frecuentes')}}</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="mr-4 hover:underline md:mr-6">{{__('Contáctanos')}}</a>
            </li>
        </ul>
    </footer>

</x-app-layout>
