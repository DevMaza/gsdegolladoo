<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalificacionRequest;
use App\Http\Requests\UpdateCalificacionRequest;
use App\Models\Calificacion;
use App\Models\Materia;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $grupo = $user->grupo;
        $examenes = $grupo->examenes()->with(['calificaciones'])->get();
        $materias = Materia::all();
        $usuarios = $grupo->usuarios->filter(fn($user) => $user->hasPermissionTo('ver-calificaciones-mias') == true);
        $actividades = $grupo->actividades()->with(['entregas'])->get();
        $actividadesPorMateria = $materias->mapWithKeys(fn($materia) => [$materia->id => $actividades->filter(fn($actividad) => $actividad->materia_id == $materia->id)]);
        $examenesPorMateria = $materias->mapWithKeys(fn($materia) => [$materia->id => $examenes->filter(fn($examen) => $examen->materia_id == $materia->id)]);
        $promedios = collect([]);
        $promedios = $usuarios->mapWithKeys(
            fn($user) => [$user->id 
                => $materias->mapWithKeys(
                    fn ($materia) => [$materia->id
                        => round(
                            (
                                $examenesPorMateria[$materia->id]
                                ->reduce(fn($carry, $examen) 
                                     => $carry + $examen->calificaciones->where('user_id', $user->id)->sum('obtenido')
                                )
                                + $actividadesPorMateria[$materia->id]
                                ->reduce(fn($carry, $examen) 
                                     => $carry + $examen->entregas->where('user_id', $user->id)->sum('calificacion')
                                )
                            ) / (
                                $examenesPorMateria[$materia->id]->count() + $actividadesPorMateria[$materia->id]->count() > 0
                                ? $examenesPorMateria[$materia->id]->count() + $actividadesPorMateria[$materia->id]->count()
                                : 1
                            )
                         , 2)
                    ]
                )
            ]
        );
        return view('calificaciones.index', compact(['user', 'grupo', 'examenes', 'materias', 'actividadesPorMateria', 'examenesPorMateria', 'usuarios', 'promedios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalificacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionRequest  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalificacionRequest $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
