@extends('layouts.plantillabase');

@section('contenido') 
<h1>EDITAR INFORMACION</h1>
<form action="/articulos/{{$articulo->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$articulo->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">cedula</label>
        <input id="cedula" name="cedula" type="number" class="form-control" value="{{$articulo->cedula}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$articulo->direccion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">telefono</label>
        <input id="telefono" name="telefono" type="number" step="any" class="form-control" value="{{$articulo->telefono}}">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">guardar</button>
</form>
@endsection