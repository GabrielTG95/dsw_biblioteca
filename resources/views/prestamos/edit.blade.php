<?php
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

    <form action="{{ route('prestamos.update',$prestamo->prestamo_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="title" value="{{ $prestamo->isbn }}" class="form-control"
                           placeholder="ISBB">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Usuario:</strong>
                    <input type="text" name="title" value="{{ $prestamo->usuario }}" class="form-control"
                           placeholder="Usuario">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ejemplar:</strong>
                    <input type="number" name="title" value="{{ $prestamo->ejemplar }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha del prestamo:</strong>
                    <input type="date" name="title" value="{{ $prestamo->fecha_prestamo }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de devolución:</strong>
                    <input type="date" name="title" value="{{ $prestamo->fecha_devolucion }}" class="form-control">
                </div>
            </div>

        <!--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Ejemplar Image">
                    <img src="/uploads/{{ //$ejemplar->image }}" width="200px">
                </div>
            </div>-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Ejemplar</button>
            </div>
        </div>
    </form>
@endsection
