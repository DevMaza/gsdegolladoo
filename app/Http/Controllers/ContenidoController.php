<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\User;


use Illuminate\Support\Facades\Storage;

class ContenidoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-contenido|crear-contenido|editar-contenido|borrar-contenido')->only('index');
         $this->middleware('permission:crear-contenido', ['only' => ['create','store']]);
         $this->middleware('permission:editar-contenido', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-contenido', ['only' => ['destroy']]);
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
         $contenidos = Contenido::paginate();
         $users = User::paginate();
         $materias = Materia::paginate();
         return view('contenidos.index',compact('contenidos','materias'),compact('users'))->with('tokenmat',$tokenmat);
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$grupo= Grupo::paginate(5);
        $grupos = Grupo::pluck('id','grado');
        $materias = Materia::pluck('materia','id');
        $users = User::paginate();
        return view('contenidos.crear',compact('grupos','materias'),compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       



        //request()->validate([
          //  'titulo' => 'required',
           // 'grupo_id' => 'required',
           // 'imagen' => 'required|image|max:3048',
            //'contenido' => 'required',
           
        //]);
        $contenido = request()->except('_token');
        if($request->hasFile('imagen')){
            $contenido['imagen']=$request->file('imagen')->store('uploads','public');
        }
    
        Contenido::insert($contenido);
       

       return redirect()->route('homecontenido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $contenido)
    {
        
        
      
        return view('contenidos.ver',compact('contenido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenido $contenido)
    {
        $grupos = Grupo::pluck('id','grado');
        $users = User::paginate();

        return view('contenidos.editar',compact('contenido'),compact('grupos'),compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenido $contenido)
    {
            request()->validate([
                'titulo' => 'required',
                'grupo_id' => 'required',
                'imagen' => 'required',
                'contenido' => 'required',
            ]);
        
            $contenido->update($request->all());
        
            return redirect()->route('contenidos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $contenido)
    {
        $contenido->delete();
    
        return redirect()->route('homecontenido');
    }
}
