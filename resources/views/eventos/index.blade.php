<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('RESERVAS') }}
        </h2>
    </x-slot>
    <br>
    <div class="container px-12 py-8 mx-auto bg-white">
        <br>
        <table class="mx-auto" style="border-collapse: separate; border-spacing: 70px 0;">
            <tr>
                <td>
                    <div id="cumple" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#contenido">
                            <img class="rounded-t-lg" src="img/globo.png" alt="" onclick="mostrar(cumple)"
                                height="300px" width="300px" />
                        </a>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center"
                                style="color: red;">Cumpleaños</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <div id="evento" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#contenido">
                            <img class="rounded-t-lg" src="img/evento.jpg" alt="" onclick="mostrar(evento)"
                                height="300px" width="300px" />
                        </a>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center"
                                style="color: red;">Evento</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <div id="cena" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#contenido">
                            <img class="rounded-t-lg" src="img/cena.jpg" alt="" onclick="mostrar(cena)"
                                height="300px" width="300px" />
                        </a>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center"
                                style="color: red;">Cena</h5>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <br><br>
        <form action="{{ route('eventos.addEvento') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="contenido" style="display: none;">
                <div class="text-center">
                    <input type="hidden" id="tipo" name="tipo" value="">
                    Nº Personas: <input type="number" name="personas" min="1" max="100" required>
                    <br><br>
                    Fecha: <input type="date" name="fecha" id="fecha" required>
                    <br><br>
                    Hora: <input type="time" name="hora" min="20:30" max="23:30" required>
                    <br><br><br>
                    <button type="submit"
                        class="px-6 py-2 text-sm rounded shadow text-red-100 bg-blue-500">Reservar</button>
                </div>
            </div>
        </form>
        <br><br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-center" onclick="mostrarreservas()">MIS RESERVAS</h2>
                <div class="p-6 text-gray-900 h-screen flex items-center justify-center" id="misreservas"
                    style="display: none;">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="font-bold">Tipo</td>
                            <td class="font-bold">Personas</td>
                            <td class="font-bold">Fecha</td>
                            <td class="font-bold">Hora</td>
                        </tr>
                        <tr>
                            <td><br></td>
                            <td><br></td>
                            <td><br></td>
                            <td><br></td>
                        </tr>
                        @foreach ($eventos as $evento)
                            @if ($evento->idUser == Auth::user()->id)
                                <tr>
                                    <td>{{ $evento->tipo }}</td>
                                    <td>{{ $evento->personas }}</td>
                                    <td>{{ $evento->fecha }}</td>
                                    <td>{{ $evento->hora }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>

    <footer
        class="fixed bottom-0 left-0 z-20 w-full p-4 bg-green-200 border-t border-gray-300 shadow md:flex md:items-center md:justify-between md:p-6">
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

    <script src="{{ asset('js/reservas-script.js') }}"></script>

</x-app-layout>
