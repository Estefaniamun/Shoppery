<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){
        $users = User::paginate(2);
        return view('users.index')->with('users', $users);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email'=>'required',
            'password'=>'required',
            'direccion' => 'required',
            'rol'=>'required'
        ]);
        try {
            $usuario = new User();
            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;
            $usuario->email = $request->email;
            $usuario->password = $request->password;
            $usuario->direccion = $request->direccion;
            $usuario->save();
            return redirect()->route('users.index')->with('status', "Usuario creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('users.index')->with('status', "No se ha podido crear el usuario");
        }
    }

    public function show($id){
        $user = User::find($id);
        $users = User::all();
         return view('users.show')->with('user', $user)->with('users', $users);
    }
    public function edit($id){
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre'=>'required',
            'apellidos'=>'required',
            'email'=>'required',
            'password'=>'required',
            'direccion' => 'required',

        ]);
        try{
            $user = User::find($id);
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return redirect()->route('users.index')->with('status', "Usuario modificado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('users.index')->with('status', "No se ha podido modificar el usuario");
        }        
    }
    public function destroy($id){
        try{
            $user = User::find($id);
            $user->delete();
            return redirect()->route('users.index')->with('status', "Usuario eliminado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('users.index')->with('status', "No se ha podido eliminado el usuario");
        }
    }

}
