<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('POLÍTICA DE PRIVACIDAD') }}
        </h2>
        <br><br>
        <div>
            @include('partials/language_switcher')
        </div>
    </x-slot>
    <br>
    <div class="container px-12 py-8 mx-auto bg-white">
    </div>

    <br><br><br><br>

    <footer
        class="fixed bottom-0 left-0 z-20 w-full p-4 border-t border-gray-300 shadow md:flex md:items-center md:justify-between md:p-6"
        style="background-color:white;">
        <span
            class="text-sm text-gray-500 sm:text-center">{{ __('© 2023 Pizzería Brenda™. Todos los derechos reservados.') }}
        </span>
        <ul class="hidden flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0 sm:flex">
            <li>
                <a href="{{ route('whoarewe') }}" class="mr-4 hover:underline md:mr-6">{{ __('¿Quiénes somos?') }}</a>
            </li>
            <li>
                <a href="{{ route('faq') }}"
                    class="mr-4 hover:underline md:mr-6">{{ __('Preguntas frecuentes') }}</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="mr-4 hover:underline md:mr-6">{{ __('Contáctanos') }}</a>
            </li>
            <li>
                <a href="{{ route('privacy') }}"
                    class="mr-4 hover:underline md:mr-6">{{ __('Política de privacidad') }}</a>
            </li>
        </ul>
    </footer>

</x-app-layout>