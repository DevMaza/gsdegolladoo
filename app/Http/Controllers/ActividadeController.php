<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividade;
use App\Models\Grupo;
use App\Models\User;
use App\Models\Materia;
use App\Models\Entregadeactividades;
use Illuminate\Support\Str;

class ActividadeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-actividade|crear-actividade|editar-actividade|borrar-actividade')->only('index');
         $this->middleware('permission:crear-actividade', ['only' => ['create','store']]);
         $this->middleware('permission:editar-actividade', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-actividade', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tokenmate = $request->all();
        $idacta= array_keys($tokenmate);
        $tokenmat=0;
        //Con paginación
        foreach ($idacta as $numero) {
           $tokenmat += $numero;
        }
        //Con paginación
         $actividades = Actividade::paginate();
         $users = User::paginate();
         $materias = Materia::paginate();
         return view('actividades.index',compact('actividades' ,'materias'),compact('users'))->with('tokenmat',$tokenmat);;
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::pluck('id','grado');
        $users = User::paginate();
        $materias = Materia::pluck('materia','id');
        return view('actividades.crear',compact('grupos','materias'),compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*   request()->validate([
            'titulo' => 'required',
            'grupo_id' => 'required',
            'descripcion' => 'required',
        ]);
    
        Actividade::create($request->all());*/
        $actividades = request()->except('_token');
        $actividades['uuid'] = (string) Str::uuid();
        if($request->hasFile('archivo')){
            $actividades['archivo']= time().'_'.$request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('archivos', $actividades['archivo'],'public');
        }
    
        // Actividade::insert($actividades);
       
        Actividade::create($actividades);
    
        return redirect()->route('homeactividade');
    }
    public function download($uuid)
    {
        $actividades = Actividade::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path("app/public/archivos/" . $actividades->archivo);
        
        return response()->download($pathToFile);
        //return response()->file($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividade $actividade)
    {
        $users = User::paginate();
        $tokentec=0;
        $entregadeactividades = Entregadeactividades::paginate();
        return view('actividades.ver',compact('entregadeactividades'),compact('actividade'))->with('tokentec',$tokentec);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividade $actividade)
    {
        $grupos = Grupo::pluck('id','grado');
        $users = User::paginate();
        return view('actividades.editar',compact('actividade'),compact('grupos'),compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividade $actividade)
    {
        request()->validate([
            'titulo' => 'required',
            'grupo_id' => 'required',
            'descripcion' => 'required',
        ]);
    
        $actividade->update($request->all());
    
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividade $actividade)
    {
        $actividade->delete();
    
        return redirect()->route('actividades.index');
    }
}
