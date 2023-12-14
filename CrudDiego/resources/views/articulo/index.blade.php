@extends('layouts.plantillabase');

@section('contenido')
<h1>EMPLEADOS</h1>

<a href="articulos/create" class="btn btn-primary">CREAR</a>

<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope = "col">ID</th>
            <th scope = "col">Nombre</th>
            <th scope = "col">Cedula</th>
            <th scope = "col">Direccion</th>
            <th scope = "col">Telefono</th>
        </tr>
    </thead>
    <tbody>
        @Foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->nombre}}</td>
            <td>{{$articulo->cedula}}</td>
            <td>{{$articulo->direccion}}</td>
            <td>{{$articulo->telefono}}</td>
            <td>
                <form action="{{ route ('articulos.destroy', $articulo->$id) }}">
                <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection