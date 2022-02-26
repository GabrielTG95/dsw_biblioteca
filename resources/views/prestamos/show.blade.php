@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>
                    <a class="btn btn-info" href="{{url('/prestamos')}}"><i class="fa fa-arrow-left"></i> Volver</a>
                    Información del préstamo
                </h2>
            </div>
        </div>
    </div>
    <div class="row shadow w-75 mx-auto p-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Libro:</strong>
                @foreach($libros as $libro)
                    @if($libro->id == $prestamo->libro_id)
                        {{ $libro->titulo }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuario:</strong>
                @foreach($users as $user)
                    @if($user->id == $prestamo->usuario)
                        {{ $user->name }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha del prestamo:</strong>
                {{ $prestamo->fecha_prestamo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de devolución:</strong>
                @if($prestamo->fecha_devolucion == null)
                    Aún no se ha devuelto
                @else
                    {{ $prestamo->fecha_devolucion }}
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group d-flex justify-content-around">
                @if(Auth::user()->rol == 0)
                        <a class="btn btn-sm btn-primary w-50 fs-6"
                           href="{{ route('prestamos.edit',$prestamo->id) }}"><i class="fa fa-pencil"></i> Editar</a>
                        <form class="w-50 m-0" action="{{ route('prestamos.destroy',$prestamo->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100  fs-6"><i
                                    class="fa fa-trash"></i> Eliminar</button>
                        </form>
                @endif
            </div>
        </div>
    </div>
@endsection
