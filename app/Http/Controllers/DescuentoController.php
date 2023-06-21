<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Descuento;
use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    public function index(){
        $descuentos = Descuento::all();
        return view('compras.index')->with('descuentos' , $descuentos);
    }
}
