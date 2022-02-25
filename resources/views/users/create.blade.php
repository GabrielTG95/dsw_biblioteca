@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Volver</a> Nuevo Usuario</h2>
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

    <form action="{{ route('users.index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row shadow w-75 mx-auto p-2">
            <div class="col-md-6 col">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="email@gmail.com"
                           value="{{ old('email') }}">
                </div>
            </div>

            <div class="col-md-6 col">
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    <input type="password" name="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select class="form-select" name="rol" id="rol">
                        <option value="0">Administrador</option>
                        <option value="1">Alumno</option>
                    </select>
                </div>
            </div>

            <div>
                <div class="form-group">
                    <strong>Imagen:</strong>
                    <input type="file" name="imagen" class="form-control" placeholder="Post Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </form>
@endsection
