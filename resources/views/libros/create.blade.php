@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/libros')}}"><i class="fa fa-arrow-left"></i> Volver</a> Añadir Libro</h2>
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

    <form action="{{ route('libros.index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row shadow w-75 mx-auto p-2">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <strong>ISBN: <span class="text-danger">*</span></strong>
                    <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="{{ old('isbn') }}">
                </div>
                <div class="form-group">
                    <strong>Título: <span class="text-danger">*</span></strong>
                    <input class="form-control" type="text" name="titulo" value="{{ old('titulo') }}">
                </div>
                <div class="form-group">
                    <strong>Autor/es: <span class="text-danger">*</span></strong>
                    <input class="form-control" type="text" name="autor" value="{{ old('autor') }}">
                </div>
                <div class="form-group">
                    <strong>Categoría: <span class="text-danger">*</span></strong>
                    <select class="form-select" name="categoria" id="categoria">
                        @foreach ($categorias->all() as $categoria)
                            @if($categoria->id == old('categoria'))
                                <option value="{{$categoria->id}}" selected>{{$categoria->definicion}}</option>
                            @else
                                <option value="{{$categoria->id}}">{{$categoria->definicion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <strong>Editorial: <span class="text-danger">*</span></strong>
                    <input class="form-control" type="text" name="editorial" value="{{ old('editorial') }}">
                </div>
                <div class="form-group">
                    <strong>Edición: <span class="text-danger">*</span></strong>
                    <input class="form-control" type="number" name="edicion" value="{{ old('edicion') }}">
                </div>
                <div class="form-group">
                    <strong>Fecha de Publicación: <span class="text-danger">*</span></strong>
                    <input class="form-control" type="number" name="fecha_publicacion" min="1700" max="2022" step="1" value="{{ old('fecha_publicacion') }}">
                </div>
                <div class="form-group">
                    <strong>Portada: <span class="text-danger">*</span></strong>
                    <input type="file" name="portada" class="form-control" placeholder="Subir imagen...">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Enlace al documento:</strong>
                    <input type="text" name="link" class="form-control" placeholder="Enlace al documento...">
                </div>
            </div>
            <p class="fw-bold text-danger mx-2">* Los campos con este símbolo són obligatorios</p>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </form>
@endsection
