<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Detalle;
class DetallesController extends Controller
{
    public function index(){
        $detalles = Detalle::all();
        return view('detalle.index')->with('detalles', $detalles);
    }


    public function create(){
        return view('detalle.create');
    }


    public function store(Request $request, $compra, $producto, $descuento)
    {
        $request->validate([
            'cantidad' => 'required',
            'total' => 'required',
            'compra'=>'required',
            'producto' => 'required',
            'descuento' => 'required',
        ]);
        try {
            $detalle = new Detalle();
            $detalle->cantidad = $request->cantidad;
            $detalle->total = $request->total;
            $detalle->compra = $compra;
            $detalle->producto = $producto;
            $detalle->descuento = $descuento;
            $detalle->save();
            return redirect()->route('detalle.index')->with('status', "Detalle creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('detalle.index')->with('status', "No se ha podido crear el detalle");
        }
    }
}
