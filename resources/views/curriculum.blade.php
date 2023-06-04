<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('CURRÍCULUM') }}
        </h2>
    </x-slot>
    <br>
    <div class="container px-12 py-8 mx-auto bg-white">
        <div class="mx-auto text-center">
            <p>¿Quieres trabajar con nosotros?<br>Envíanos ya tu currículum.</p>
        </div>
        <br><br>
        <div class="mx-auto text-center">
            <form action="{{ route('curriculum.addCurriculum') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="curriculum" id="curriculum" required>
                <br><br><br>
                <button type="submit" class="px-6 py-2 text-sm rounded shadow text-red-100 bg-blue-500">Enviar currículum</button>
            </form>
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
            <li>
                <a href="faq" class="mr-4 hover:underline md:mr-6">Preguntas frecuentes</a>
            </li>
            <li>
                <a href="contact" class="mr-4 hover:underline md:mr-6">Contáctanos</a>
            </li>
        </ul>
    </footer>

</x-app-layout>