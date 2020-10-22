<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelos\Producto;

class ProductoController extends Controller
{
    
    public function index($id = null){
        if($id)
            return response()->json(["producto"=>Producto::find($id)],200);
        return response()->json(["Productos"=>Producto::all()],200);
        
    }

    public function guardar(Request $request){
        $prod = new Producto();
        $prod->nombre = $request->nombre;
        $prod->valor = $request->valor;

        if($prod->save())
            return response()->json(["producto"=>$prod],201);
        return response()->json(null,400);

    }

    public function editar(Request $request, $id){
        $actualizar = new Producto();
        $actualizar = Producto::find($id);
        $actualizar->nombre = $request->get('nombre');
        $actualizar->valor = $request->get('valor');
        $actualizar->save();
        
        return response()->json(["producto"=>$actualizar],201);
        return response()->json(null,400);

    }

    public function destruir($id){
        $borrar = new Producto();
        $borrar = Producto::find($id);
        $borrar->delete();

        return response()->json(["Productos"=>Producto::all()],200);
    }
}
