<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index(){
      
        return view('compras.index');
    }

    public function create(){
        return view('compra.create');
    }

    public function store(Request $request)
    {
        $usuarioLogueado = Auth::user();
        $request->validate([
            'metodo_pago' => 'required',
            'fecha' => 'required',
            'usuario'=>'required',
        ]);

        $request->merge(['usuario' => $usuarioLogueado]);
        try {
            $compra = new Compra();
            $compra->metodo_pago = $request->metodo_pago;
            $compra->fecha = $request->fecha;
            $compra->usuario = $request->input('usuario');
            $compra->save();
            return redirect()->route('compra.index')->with('status', "compra creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('compra.index')->with('status', "No se ha podido crear la compra");
        }
    }
    public function show($id, $producto){
        $compra = Compra::find($id);
        $producto = Producto::find($producto);
        
         return view('detalle.create')->with('compra', $compra)->with('producto', $producto);
    }
}
