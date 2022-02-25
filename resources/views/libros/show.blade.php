@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/libros')}}"><i class="fa fa-arrow-left"></i> Volver</a>
                    Información del libro</h2>
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
                <img class="w-100" src="{{asset('uploads/').'/'.$libro->portada}}"
                     alt="Portada del libro {{$libro->titulo}}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>ISBN:</strong>
                {{ $libro->isbn }}
            </div>
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $libro->titulo }}
            </div>
            <div class="form-group">
                <strong>Autor:</strong>
                {{ $libro->autor }}
            </div>
            <div class="form-group">
                <strong>Categoría:</strong>
                {{ $libro->categoria }}
            </div>
            <div class="form-group">
                <strong>Editorial:</strong>
                {{ $libro->editorial }}
            </div>
            <div class="form-group">
                <strong>Edición:</strong>
                {{ $libro->edicion }}
            </div>
            <div class="form-group">
                <strong>Fecha de publicación:</strong>
                {{ $libro->fecha_publicacion }}
            </div>
            <div class="form-group">
                <strong>Disponibilidad:</strong>
                @if($libro->disponible == 0)
                    Disponible
                @else
                    No Disponible
                @endif
            </div>

            <div class="d-flex justify-content-center">
                @isset(Auth::user()->rol)
                    @if(Auth::user()->rol == 0)
                        <a class="btn btn-sm btn-primary w-50 fs-5 mx-1 float-start"
                           href="{{ route('libros.edit',$libro->id) }}">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                        <form class="w-50" action="{{ route('libros.destroy',$libro->id) }}" method="POST"
                              onsubmit="return confirm('¿De verdad desea eliminar este libro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-1 w-100 fs-5">
                                <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </form>
                    @endif
                @endisset
            </div>
        </div>
    </div>
@endsection
