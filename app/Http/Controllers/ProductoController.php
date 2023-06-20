<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        $user = Auth()->user();
        return view('productos.index')->with('productos', $productos)->with('user', $user);
    }

    public function create(){
        $categorias = Categoria::all();
        return view('productos.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'foto'=>'required | image',
            'precio'=>'required',
            'talla' => 'required',
            'categoria'=>'required'
        ]);
        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $producto->foto = $nombrefoto;
            $producto->precio = $request->precio;
            $producto->talla = $request->talla;
            $producto->categoria = $request->categoria;
            $producto->save();
            $request->file('foto')->storeAs('public/img_productos', $nombrefoto);
            return redirect()->route('productos.index')->with('status', "producto creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('productos.index')->with('status', "No se ha podido crear el producto");
        }

        
    }
   
    public function edit($id){
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.edit')->with('producto', $producto)->with('categorias', $categorias);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'foto'=>'image',
            'precio'=>'required',
            'talla' => 'required',
            'categoria'=>'required'

        ]);
        try{
           $producto = Producto::findOrFail($id);
           $producto->nombre = $request->nombre;
           $producto->descripcion = $request->descripcion;
           $producto->precio = $request->precio;
           $producto->talla = $request->talla;
           $producto->categoria = $request->categoria;
           if(is_uploaded_file($request->foto)){
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $producto->foto = $nombrefoto;
            $request->file('foto')->storeAs('public/img_productos', $nombrefoto);
           }
           $producto->save();
            return redirect()->route('productos.index')->with('status', "Producto modificado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('productos.index')->with('status', "No se ha podido modificar el producto");
        }        
    }
    public function destroy($id){
        try{
            $producto = Producto::find($id);
            $producto->delete();
            return redirect()->route('productos.index')->with('status', "Producto eliminado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('productos.index')->with('status', "No se ha podido eliminado el producto");
        }
    }
}
