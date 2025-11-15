<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Espacio;


class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::with('espacio')->orderBy('fecha','desc')->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espacios = Espacio::orderBy('nombre')->get();
        return view('reservas.create', compact('espacios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'espacio_id' => 'required|exists:espacios,id',
            'solicitante' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'motivo' => 'nullable|string',
        ]);

        // Verificar solapamientos
        $existe = Reserva::where('espacio_id', $request->espacio_id)
            ->where('fecha', $request->fecha)
            ->where(function ($q) use ($request) {
                $q->where('hora_inicio', '<', $request->hora_fin)
                ->where('hora_fin', '>', $request->hora_inicio);
            })
            ->exists();

        if ($existe) {
            return back()
                ->withErrors(['La hora seleccionada se cruza con otra reserva existente.'])
                ->withInput();
        }

        Reserva::create($data);

        return redirect()->route('reservas.index')->with('ok','Reserva creada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        $espacios = Espacio::orderBy('nombre')->get();
        return view('reservas.edit', compact('reserva', 'espacios'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        $data = $request->validate([
            'espacio_id'   => 'required|exists:espacios,id',
            'solicitante'  => 'required|string|max:255',
            'fecha'        => 'required|date',
            'hora_inicio'  => 'required|date_format:H:i',
            'hora_fin'     => 'required|date_format:H:i|after:hora_inicio',
            'motivo'       => 'nullable|string',
        ]);

        // De mas: 
        $existe = Reserva::where('espacio_id', $request->espacio_id)
        ->where('fecha', $request->fecha)
        ->where('id', '!=', $reserva->id)
        ->where(function ($q) use ($request) {
            $q->where('hora_inicio', '<', $request->hora_fin)
            ->where('hora_fin', '>', $request->hora_inicio);
        })
        ->exists();

            if ($existe) {
                return back()
                    ->withErrors(['La hora seleccionada se cruza con otra reserva existente.'])
                    ->withInput();
}


        $reserva->update($data);

        return redirect()->route('reservas.index')->with('ok', 'Reserva actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('ok', 'Reserva eliminada');
    }
}

