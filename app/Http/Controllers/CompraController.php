<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Descuento;
use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index($id){
      $producto = Producto::find($id);
      $descuentos = Descuento::all();
      
        return view('compras.index')->with('producto', $producto)->with('descuentos', $descuentos);
    }

    public function store(Request $request, $id)

    {
        $request->validate([
            'metodo_pago' => 'required',
            'fecha' => 'required',
            'usuario'=>'required',
        ]);

        try {
            $compra = new Compra();
            $compra->metodo_pago = $request->pago;
            $compra->fecha = $request->fecha;
            $compra->usuario = $request->user;
            $producto = $id;
            $descuento = $request->descuento;
            $cantidad = $request->cantidad;
            $total = $request->cantidad*$descuento*$producto->precio;
            $compra->save();
            return redirect()->route('compra.index')->with('status', "compra creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('compra.index')->with('status', "No se ha podido crear la compra");
        }
    }
}
