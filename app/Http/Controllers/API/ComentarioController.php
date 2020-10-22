<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelos\Comentarios;

class ComentarioController extends Controller
{
    public function index($id = null){
        if($id)
            return response()->json(["comentario"=>Comentarios::find($id)],200);
        return response()->json(["comentarios"=>Comentarios::all()],200);
        
    }

    public function commporpersona($id){
        $comment = Comentarios::where('persona_id', $id)->get();
        return response()->json($comment);  
    }

    public function guardar(Request $request){
        $comm = new Comentarios();
        $comm->titulo = $request->titulo;
        $comm->comentario = $request->comentario;
        $comm->persona_id = $request->persona;
        $comm->producto_id = $request->producto;


        if($comm->save())
            return response()->json(["comentario"=>$comm],201);
        return response()->json(null,400);

    }

    public function editar(Request $request, $id){
        $actualizar = new Comentarios();
        $actualizar = Comentarios::find($id);
        $actualizar->titulo = $request->get('titulo');
        $actualizar->comentario = $request->get('comentario');
        $actualizar->persona_id = $request->get('persona');
        $actualizar->producto_id = $request->get('producto');
        $actualizar->save();
        
        return response()->json(["comentario"=>$actualizar],201);
        return response()->json(null,400);

    }

    public function destruir($id){
        $borrar = new Comentarios();
        $borrar = Comentarios::find($id);
        $borrar->delete();

        return response()->json(["comentarios"=>Comentarios::all()],200);
    }
}
