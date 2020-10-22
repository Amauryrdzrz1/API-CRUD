<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelos\Persona;

class PersonaController extends Controller
{
    public function index($id = null){
        if($id)
            return response()->json(["persona"=>Persona::find($id)],200);
        return response()->json(["personas"=>Persona::all()],200);
        
    }

    public function guardar(Request $request){
        $persona = new Persona();
        $persona->nombre = $request->nombre;

        if($persona->save())
            return response()->json(["persona"=>$persona],201);
        return response()->json(null,400);

    }

    public function editar(Request $request, $id){
        $actualizar = new Persona();
        $actualizar = Persona::find($id);
        $actualizar->nombre = $request->get('nombre');
        $actualizar->save();
        
        return response()->json(["persona"=>$actualizar],201);
        return response()->json(null,400);

    }

    public function destruir($id){
        $borrar = new Persona();
        $borrar = Persona::find($id);
        $borrar->delete();

        return response()->json(["personas"=>Persona::all()],200);
    }

}
