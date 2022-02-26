@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><a class="btn btn-info" href="{{url('/prestamos')}}"><i class="fa fa-arrow-left"></i> Volver</a> Editar Prestamo</h2>
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

    <form action="{{ route('prestamos.update',$prestamo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row shadow w-75 mx-auto p-3">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <strong>Libro:</strong>
                    @foreach($libros as $libro)
                        @if($libro->id == $prestamo->libro_id)
                            <input type="text" name="usuario" value="{{ $libro->titulo }}" class="form-control"
                                   placeholder="Usuario" disabled>
                        @endif
                    @endforeach
                </div>
                <div class="form-group visually-hidden">
                    <strong>ID del libro:</strong>
                    <input type="number" name="libro_id" value="{{ $prestamo->libro_id }}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <strong>Usuario:</strong>
                    @foreach($users as $user)
                        @if($user->id == $prestamo->usuario)
                            <input type="text" name="usuario" value="{{ $user->name }}" class="form-control"
                                   placeholder="Usuario" disabled>
                        @endif
                    @endforeach
                </div>
                <div class="form-group visually-hidden">
                    <strong>ID del usuario:</strong>
                    <input type="number" name="usuario" value="{{ $prestamo->usuario }}" class="form-control"
                           placeholder="Usuario" readonly>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <strong>Fecha prestamo: <span class="text-danger">*</span></strong>
                    <input type="datetime-local" name="fecha_prestamo" value="{{ date('Y-m-d\TH:i', strtotime($prestamo->fecha_prestamo)) }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <strong>Fecha devolución:</strong>
                    @if($prestamo->fecha_devolucion != null)
                        <input type="datetime-local" name="fecha_devolucion" value="{{ date('Y-m-d\TH:i', strtotime($prestamo->fecha_devolucion)) }}" class="form-control">
                    @else
                        <input type="datetime-local" name="fecha_devolucion" value="" class="form-control">
                    @endif
                </div>
            </div>
            <p class="fw-bold text-danger mx-2">* Los campos con este símbolo són obligatorios</p>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </form>
@endsection
