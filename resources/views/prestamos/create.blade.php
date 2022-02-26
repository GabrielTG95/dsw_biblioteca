@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/prestamos')}}"><i class="fa fa-arrow-left"></i> Volver</a> Añadir Prestamo</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Oh-oh!</strong> Ha surgido algún problema.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('prestamos.index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row shadow w-75 mx-auto p-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Libros: <span class="text-danger">*</span></strong>
                    <select class="form-control" name="libro_id" id="libro_id">
                        @foreach ($libros->all() as $libro)
                            @if($libro->disponible == 0)
                                <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Usuario: <span class="text-danger">*</span></strong>
                    <select class="form-control" name="usuario" id="libro_id">
                        @foreach ($users->all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p class="fw-bold text-danger mx-2">* Los campos con este símbolo són obligatorios</p>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </form>
@endsection
