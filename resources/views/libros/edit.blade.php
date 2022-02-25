@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/libros')}}"><i class="fa fa-arrow-left"></i> Volver</a> Editar Libro</h2>
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

    <form action="{{ route('libros.update',$libro->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row shadow w-75 mx-auto p-3">
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="{{ $libro->isbn }}">
                </div>
                <div class="form-group">
                    <strong>Título:</strong>
                    <input class="form-control" type="text" name="titulo" value="{{ $libro->titulo }}">
                </div>
                <div class="form-group">
                    <strong>Autor/es:</strong>
                    <input class="form-control" type="text" name="autor" value="{{ $libro->autor }}">
                </div>
                <div class="form-group">
                    <strong>Categoría:</strong>
                    <select class="form-select" name="categoria" id="categoria">
                        @foreach ($categorias->all() as $categoria)
                            @if($categoria->id == $libro->categoria)
                                <option value="{{$categoria->id}}" selected>{{$categoria->definicion}}</option>
                            @else
                                <option value="{{$categoria->id}}">{{$categoria->definicion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Editorial:</strong>
                    <input class="form-control" type="text" name="editorial" value="{{ $libro->editorial }}">
                </div>
                <div class="form-group">
                    <strong>Edición:</strong>
                    <input class="form-control" type="number" name="edicion" value="{{ $libro->edicion }}">
                </div>
                <div class="form-group">
                    <strong>Fecha de Publicación:</strong>
                    <input class="form-control" type="number" name="fecha_publicacion" min="1700" max="2022" step="1" value="{{ $libro->fecha_publicacion }}">
                </div>
                <div class="form-group">
                    <br>
                    <strong>Disponible:</strong>
                    @if($libro->disponible == 0)
                        <input class="form-check-control" type="checkbox" name="disponible" checked>
                    @else
                        <input class="form-check-control" type="checkbox" name="disponible" checked>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Portada:</strong>
                    <input type="file" name="portada" class="form-control" placeholder="Subir imagen...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
@endsection
