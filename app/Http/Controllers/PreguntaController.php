<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreguntaRequest;
use App\Http\Requests\UpdatePreguntaRequest;
use App\Models\Examen;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-pregunta|crear-pregunta|editar-pregunta|borrar-pregunta')->only('index');
        $this->middleware('permission:ver-pregunta', ['only' => ['view']]);
        $this->middleware('permission:crear-pregunta', ['only' => ['create','store']]);
        $this->middleware('permission:editar-pregunta', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-pregunta', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Examen $examen)
    {
        $preguntas = $examen->preguntas()->with(['examen'])->paginate();
        return view('examenes.preguntas.index',compact('preguntas', 'examen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Examen $examen)
    {
        return view ('examenes.preguntas.form', compact('examen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePreguntaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreguntaRequest $request, Examen $examen)
    {
        $examen->preguntas()->create($request->validated());
        return redirect()->route('preguntas.index', ['examen' => $examen->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        return view('examenes.preguntas.ver', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        $examen = $pregunta->examen;
        return view ('examenes.preguntas.form', compact('pregunta', 'examen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreguntaRequest  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreguntaRequest $request, Pregunta $pregunta)
    {
        $pregunta->fill($request->validated())->save();
        return redirect()->route('preguntas.index', ['examen' => $pregunta->examen_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();
        return redirect()->route('preguntas.index', ['examen' => $pregunta->examen_id]);
    }
}
