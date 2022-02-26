<?php

use App\Models\Prestamo;

$prestamosTotales = Prestamo::where('usuario', '=', $user->id)->count();
?>

@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Volver</a>
                    Información del Usuario</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row shadow mt-3 p-3 w-75 mx-auto">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class=" text-center">
                <img class="w-100" src="{{asset('uploads/').'/'.$user->imagen}}" alt="Portada del user {{$user->name}}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Correo Electrónico:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Fecha de Creación:</strong>
                {{ $user->created_at }}
            </div>
            <div class="form-group">
                <strong>Tipo de usuario:</strong>
                @if($user->rol == 0)
                    Administrador
                @else
                    Alumno
                @endif
            </div>

            <div class="d-flex justify-content-center">
                @if(Auth::user()->rol == 0)
                    <a class="btn btn-sm btn-primary w-50 fs-5 mx-1 float-start"
                       href="{{ route('users.edit',$user->id) }}">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <form class="w-50" action="{{ route('users.destroy',$user->id) }}" method="POST"
                          onsubmit="return confirm('¿De verdad desea eliminar este user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger mx-1 w-100 fs-5">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <h2 class="text-center mt-4">Alquieres realizados:</h2>
    <div class="row shadow mt-2 p-3 w-75 mx-auto">
        @if($prestamosTotales <= 0)
            <h3 class="text-center" colspan="4">Este usuario no ha realizado ningún alquiler.</h3>
        @else
        <table class="table table-bordered">
            <tr>
                <th>Libro</th>
                <th>Fecha del prestamo</th>
                <th>Fecha de devolución</th>
                <th>Opciones</th>
            </tr>
            @foreach ($prestamos as $prestamo)
                @if($prestamo->usuario == $user->id)
                    <tr>
                        @foreach($libros as $libro)
                            @if($prestamo->libro_id == $libro->id)
                                <td>{{ $libro->titulo }}</td>
                            @endif
                        @endforeach
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        @if($prestamo->fecha_devolucion == null)
                            <td>Aún no se ha devuelto</td>
                        @else
                            <td>{{ $prestamo->fecha_devolucion }}</td>
                        @endif
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-sm btn-info w-25 fs-6" href="{{ route('prestamos.show',$prestamo->id) }}"><i
                                    class="fa fa-info"></i></a>
                            <a class="btn btn-sm btn-primary w-25 fs-6"
                               href="{{ route('prestamos.edit',$prestamo->id) }}"><i class="fa fa-pencil"></i></a>
                            <form class="w-25 m-0" action="{{ route('prestamos.destroy',$prestamo->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100 m-0 fs-6"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
            @endif
    </div>
@endsection
