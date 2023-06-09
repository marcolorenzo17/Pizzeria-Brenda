<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class EventoController extends Controller
{

    public function index(): Response {
        $eventos = DB::select('select * from eventos order by id desc');
        return response()->view('eventos.index', ['eventos' => $eventos]);
    }

    public function add(Request $req) {
        /*
        $req->validate([
            'personas' => 'required|numeric|min:1|max:100',
            'fecha' => 'required|date',
            'hora' => 'required',

        ]);
        */
        $validate = Validator::make($req->all(), [
            'personas' => 'required|numeric|min:1|max:100',
            'fecha' => 'required|date',
            'hora' => 'required',
        ],[
            'personas.required' => 'El campo es obligatorio.',
            'personas.min' => 'La reserva debe ser al menos para 1 persona.',
            'personas.max' => 'La reserva no puede ser para más de 100 personas.',
            'fecha.required' => 'El campo es obligatorio.',
            'hora.required' => 'El campo es obligatorio.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        $evento = new Evento;
        $evento->idUser = Auth::user()->id;
        $evento->personas = $req->personas;
        $evento->tipo = $req->tipo;
        $evento->fecha = $req->fecha;
        $evento->hora = $req->hora;
        $evento->presupuesto = $req->presupuesto;

        $evento->save();

        session()->flash('notif.success', 'Se ha realizado la reserva con éxito.');
        return redirect()->route('eventos.index');
    }

    public function eventosi(string $id) {
        $evento = Evento::findOrFail($id);

        $evento->reservado = "true";

        $evento->update();

        session()->flash('notif.success', 'La reserva ha sido aceptada.');
        return redirect()->route('eventos.index');
    }

    public function eventono(string $id) {
        $evento = Evento::findOrFail($id);

        $evento->reservado = "false";

        $evento->update();

        session()->flash('notif.success', 'La reserva ha sido denegada.');
        return redirect()->route('eventos.index');
    }
}
