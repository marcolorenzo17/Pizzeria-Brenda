<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ $products->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Precio' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $products->price }} €
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Descripción' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $products->description }}
                        </p>
                    </div>
                    <br>
                    <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">VOLVER</a>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>

    <footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-green-200 border-t border-gray-300 shadow md:flex md:items-center md:justify-between md:p-6">
        <span class="text-sm text-gray-500 sm:text-center">© 2023 Pizzería Brenda™. Todos los derechos reservados.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
            <li>
                <a href="whoarewe" class="mr-4 hover:underline md:mr-6">¿Quiénes somos?</a>
            </li>
        </ul>
    </footer>

</x-app-layout>
