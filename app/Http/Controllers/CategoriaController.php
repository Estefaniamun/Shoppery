<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $productos = Producto::all();
        return view('welcome')->with('categorias' , $categorias)->with('productos', $productos);
    }

}
