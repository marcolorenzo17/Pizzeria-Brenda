<link rel="stylesheet" href="/css/index.css" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('RECIBOS') }}
        </h2>
        <div>
            @include('partials/language_switcher')
        </div>
    </x-slot>
    <link rel="stylesheet" href="/css/recibos.css" />

    <div class="py-12">
        @if (Auth::user()->admin)
            <p class="text-center" style="font-weight:bolder;">{{__('LISTA PARA ADMINISTRADORES')}}</p>
            <br>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 h-screen flex items-center justify-center">
                    <table class="table-auto w-full" style="border-collapse:separate; border-spacing:0 10px;">
                        <tr>
                            @if (Auth::user()->admin)
                                <td class="font-bold">{{__('Cliente')}}</td>
                            @endif
                            <td class="font-bold">{{__('Coste')}}</td>
                            <td class="font-bold">{{__('Dirección')}}</td>
                            <td class="font-bold">{{__('Teléfono')}}</td>
                            <td class="font-bold">{{__('Fecha y hora')}}</td>
                            <td class="font-bold">{{__('Estado')}}</td>
                            <td class="font-bold">{{__('Pago')}}</td>
                            @if (Auth::user()->admin)
                                <td class="font-bold">{{__('Eliminar')}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        @foreach ($recibos as $recibo)
                            @if (Auth::user()->admin)
                                <tr>
                                    <td>{{ \App\Models\User::where(['id' => $recibo->idUser])->pluck('name')->first() }}</td>
                                    <td>{{ number_format($recibo->total, 2, '.', '') }} €</td>
                                    <td>{{ $recibo->direccion }}</td>
                                    <td>{{ $recibo->telefono }}</td>
                                    <td>{{ $recibo->created_at }}</td>
                                    <td>
                                        <form action="{{ route('recibos.actualizar', $recibo->id) }}" method="POST">
                                        @csrf
                                            <select id="estado" name="estado">
                                                <option value="Pedido registrado">{{__('Pedido registrado')}}</option>
                                                <option value="Pedido en preparación">{{__('Pedido en preparación')}}</option>
                                                <option value="Pedido en reparto">{{__('Pedido en reparto')}}</option>
                                                <option value="Pedido entregado">{{__('Pedido entregado')}}</option>
                                            </select>
                                            <br>
                                            <strong>{{__('Estado actual:')}}</strong>&nbsp;{{ __($recibo->estado) }}
                                            <br><br>
                                            <div class="text-center">
                                                <button type="submit"
                                                class="px-6 py-2 text-sm rounded shadow text-red-100 bg-blue-500">{{__('ACTUALIZAR')}}</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($recibo->pagado)
                                            <form method="post" action="{{ route('recibos.nopagado', $recibo->id) }}">
                                                @csrf
                                                <button id="pagado" class="hover:text-white px-4 py-2 rounded-md" style="border-color:green; border-style:solid; border-width:1px;">{{__('PAGADO')}}</button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('recibos.pagado', $recibo->id) }}">
                                                @csrf
                                                <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">{{__('PENDIENTE')}}</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('recibos.destroy', $recibo->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">x</button>
                                        </form>
                                    </td>
                                </tr>
                            @elseif ($recibo->idUser == Auth::user()->id)
                                <tr>
                                    <td>{{ number_format($recibo->total, 2, '.', '') }} €</td>
                                    <td>{{ $recibo->direccion }}</td>
                                    <td>{{ $recibo->telefono }}</td>
                                    <td>{{ $recibo->created_at }}</td>
                                    <td>{{ __($recibo->estado) }}</td>
                                    <td>
                                        @if ( $recibo->pagado )
                                            {{__('Pago realizado')}}
                                        @else
                                            {{__('Pago en curso')}}
                                        @endif
                                    </td>
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
