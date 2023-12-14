<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos',$articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();

        $articulos->nombre = $request->get('nombre');
        $articulos->cedula = $request->get('cedula');
        $articulos->direccion = $request->get('direccion');
        $articulos->telefono = $request->get('telefono');

        $articulos->save();
 
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Articulo::find($id);

        $articulo->nombre = $request->get('nombre');
        $articulo->cedula = $request->get('cedula');
        $articulo->direccion = $request->get('direccion');
        $articulo->telefono = $request->get('telefono');

        $articulo->save();
 
        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
}
