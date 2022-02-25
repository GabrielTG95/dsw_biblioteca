@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Volver</a> Editar Usuario</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row shadow w-75 mx-auto p-3">
            <div class="col-md-6 col">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                           placeholder="ISBB">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                           placeholder="email@gmail.com">
                </div>
            </div>

            <div class="col-md-6 col">
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select class="form-select" name="rol" id="rol">
                        @if($user->rol == 0)
                            <option value="0" selected>Administrador</option>
                            <option value="1">Alumno</option>
                        @else
                            <option value="0">Administrador</option>
                            <option value="1" selected>Alumno</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <strong>Imagen:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Post Image">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
@endsection
