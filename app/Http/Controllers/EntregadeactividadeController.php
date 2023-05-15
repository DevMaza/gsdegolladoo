<?php

namespace App\Http\Controllers;
use App\Models\Entregadeactividades;
use Illuminate\Http\Request;
use App\Models\Actividade;
use App\Models\Grupo;
use App\Models\User;
use Hamcrest\Core\HasToString;

class EntregadeactividadeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idact=$_REQUEST;
        //Con paginación
        $entregadeactividades = Entregadeactividades::paginate(5);
        $users = User::paginate(5);
        return view('entregadeactividades.index',compact('entregadeactividades'),compact('users'))->with('idact',$idact);
  
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
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
