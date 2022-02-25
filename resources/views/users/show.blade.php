@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Volver</a> Información del Usuario</h2>
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
                    <a class="btn btn-sm btn-primary w-50 fs-5 mx-1 float-start" href="{{ route('users.edit',$user->id) }}">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <form class="w-50" action="{{ route('users.destroy',$user->id) }}" method="POST" onsubmit="return confirm('¿De verdad desea eliminar este user?');">
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
@endsection
