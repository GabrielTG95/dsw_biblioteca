@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Prestamo</h2>
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

    <form action="{{ route('prestamos.update',$prestamo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Libro: {{ $prestamo->libro_id }}</strong>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Usuario:</strong>
                    <input type="text" name="usuario" value="{{ $prestamo->usuario }}" class="form-control"
                           placeholder="Usuario">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha del prestamo:</strong>
                    <input type="datetime-local" name="fecha_prestamo" value="{{ date('Y-m-d\TH:i', strtotime($prestamo->fecha_prestamo)) }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de devolución:</strong>
                    @if($prestamo->fecha_devolucion != null)
                        <input type="datetime-local" name="fecha_devolucion" value="{{ date('Y-m-d\TH:i', strtotime($prestamo->fecha_devolucion)) }}" class="form-control">
                    @else
                        <input type="datetime-local" name="fecha_devolucion" value="" class="form-control">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Ejemplar</button>
            </div>
        </div>
    </form>
@endsection
