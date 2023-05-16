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
        $name = $request->all();
        $idacta= array_keys($name);
        $idact=0;
        //Con paginación
        foreach ($idacta as $numero) {
            $idact += $numero;
        }
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
       // request()->validate([
        //    'archivo' => 'required',
         //   'calificacion' => 'required',
          //  'user_id' => 'required',
          //  'actividade_id' => 'required',
       // ]);
       $entregar = request()->except('_token');
       if($request->hasFile('archivo')){
           $entregar['archivo']= time().'_'.$request->file('archivo')->getClientOriginalName();
           $request->file('archivo')->storeAs('archivos2', $entregar['archivo'],'public');
        
           Entregadeactividades::create($entregar);
        }
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
