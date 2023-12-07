<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller{

    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

        $request->request->add(['cedula' => Str::slug($request->cedula) ]);

        $this->validate($request, [
            'nombre'=>'required | max:30',
            'cedula'=>'required |min:3|max:30',
            'direccion' =>'required |direccion|max:60',
            'telefono' =>'required|confirmed|min:6'
        ]);

        user::create([
            'nombre' => $request -> nombre,
            'cedula' => Str::lower($request-> cedula),
            'direccion' => $request -> direccion,
            'telefono' => $request -> telefono,
        ]);

        auth()->attempt([
            'direccion'=> $request->direccion,
            'telefono'=>$request->telefono
        ]);
        return redirect()->route('post.index');
    }

}