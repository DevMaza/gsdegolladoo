<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalificarExamenRequest;
use App\Http\Requests\StoreExamenRequest;
use App\Http\Requests\UpdateExamenRequest;
use App\Models\Calificacion;
use App\Models\Examen;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Pregunta;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-examen|crear-examen|editar-examen|borrar-examen')->only('index');
        $this->middleware('permission:ver-examen', ['only' => ['view']]);
        $this->middleware('permission:realizar-examen', ['only' => ['mios', 'realizar']]);
        $this->middleware('permission:crear-examen', ['only' => ['create','store']]);
        $this->middleware('permission:editar-examen', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-examen', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examen::with(['materia', 'grupo'])->paginate();
        return view('examenes.index',compact('examenes'));
    }

    public function mios()
    {
        $examenes = auth()->user()->examenes()->paginate();
        return view('examenes.mios',compact('examenes'));
    }

    public function realizar(Examen $examen)
    {
        if ($examen->realizado) abort(403, 'Ya realizaste este examen');
        $preguntas = $examen->preguntas->makeHidden(['correcta', 'created_at', 'updated_at', 'examen_id']);
        return view('examenes.realizar', compact('examen', 'preguntas'));
    }

    public function calificar(CalificarExamenRequest $request, Examen $examen)
    {
        if ($examen->realizado) return response()->json(['message' => 'Ya realizaste este examen'], 403);
        $preguntas = $examen->preguntas;
        $correctas = collect($request->ids)->filter(function($id, $key) use ($preguntas, $request) {
            $pregunta = $preguntas->find($id);
            $value = $request->values[$key];
            return $pregunta->correcta == $value;
        });
        $calificacion = round(($correctas->count() / $preguntas->count()) * 10 ,2);
        Calificacion::updateOrCreate(
            ['examen_id' => $examen->id, 'user_id' => auth()->user()->id],
            ['obtenido' => $calificacion]
        );
        return response()->json(['message' => 'Se ha calificado el examen correctamente.', 'calificacion' => $calificacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Examen $examen = null)
    {
        $materias = Materia::all();
        $grupos = Grupo::all();
        return view ('examenes.form', compact('examen', 'materias', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamenRequest $request)
    {
        $data = $request->validated();
        $data['grupo_id'] = auth()->user()->grupo_id;
        Examen::create($data);
        return redirect()->route('examenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        return view('examenes.ver', compact('examen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        return $this->create($examen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamenRequest  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamenRequest $request, Examen $examen)
    {
        $examen->fill($request->validated())->save();
        return redirect()->route('examenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return redirect()->route('examenes.index');
    }
}
