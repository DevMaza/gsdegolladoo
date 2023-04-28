<?php

namespace App\Http\Controllers;
use App\Models\Entregadeactividades;
use Illuminate\Http\Request;

class EntregadeactividadeController extends Controller
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
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'archivo' => 'required',
            'calificacion' => 'required',
            'user_id' => 'required',
            'actividade_id' => 'required',
        ]);
    
        Entregadeactividades::create($request->all());
    
        return redirect()->route('actividades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
