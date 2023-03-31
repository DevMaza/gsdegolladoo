<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
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
    public function index()
    {
          
         //Con paginación
         $contenidos = Contenido::paginate(5);
         return view('contenidos.index',compact('contenidos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contenidos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
    
        Contenido::create($request->all());
    
        return redirect()->route('contenidos.index');
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
        return view('contenidos.editar',compact('contenido'));
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
    
        return redirect()->route('contenidos.index');
    }
}
