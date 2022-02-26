<?php

use Carbon\Carbon;

?>

@extends('layouts.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2 class="text-center">Prestamos</h2>
                @if(Auth::user()->rol == 1 && Carbon::parse(Auth::user()->sancion) > Carbon::now())
                    <p class="alert alert-warning text-center fw-bold">Tienes una sanción hasta la
                        fecha: {{Auth::user()->sancion}}</p>
                @endif
            </div>
        </div>
    </div>
    @if(Auth::user()->rol == 0)
        <a href="{{route('prestamos.create')}}" class="btn btn-success d-block ms-auto w-25">
            {{__('Añadir Prestamo')}}
            <i class="fa fa-plus-square"></i>
        </a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('masDeDos'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
    @endif
    <div class="d-flex justify-content-start flex-wrap">
        <p class="bg-warning p-1 rounded"><i class="fa fa-clock-o"></i> Pendiente de entrega</p>
        <p class="bg-info p-1 rounded mx-2"><i class="fa fa-exclamation"></i> Entrega atrasada</p>
        <p class="bg-success p-1 rounded mx-2"><i class="fa fa-check"></i> Entrega a tiempo</p>
        <p class="bg-danger p-1 rounded"><i class="fa fa-calendar-times-o"></i> Pendiente fuera de tiempo</p>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Estado</th>
            <th>Libro</th>
            @if(Auth::user()->rol == 0)
                <th>Usuario</th>
            @endif
            <th>Fecha del prestamo</th>
            <th>Fecha de devolución</th>
            @if(Auth::user()->rol == 0)
                <th>Opciones</th>
            @endif
        </tr>
        @foreach ($records as $record)
            @if(Auth::user()->rol == 0 || Auth::user()->id == $record->usuario)
                <tr>
                @if($record->fecha_devolucion == null)
                    @if(Carbon::parse($record->fecha_prestamo)->diffInDays(Carbon::now()) > 6)
                        <td class="bg-danger text-center"><i class="fa fa-calendar-times-o fs-5 fw-bold"></i></td>
                    @else
                        <td class="bg-warning text-center"><i class="fa fa-clock-o fs-5 fw-bold"></i></td>
                    @endif
                @else
                    @if(Carbon::parse($record->fecha_prestamo)->diffInDays(Carbon::parse($record->fecha_devolucion)) > 6)
                        <td class="bg-info text-center"><i class="fa fa-exclamation fs-5 fw-bold"></i></td>
                    @else
                        <td class="bg-success text-center"><i class="fa fa-check fs-5 fw-bold"></i></td>
                    @endif
                @endif
                    @foreach($libros as $libro)
                        @if($record->libro_id == $libro->id)
                            <td>{{ $libro->titulo }}</td>
                        @endif
                    @endforeach
                    @if(Auth::user()->rol == 0)
                        @foreach($users as $user)
                            @if($record->usuario == $user->id)
                                <td>{{ $user->name }}</td>
                            @endif
                        @endforeach
                    @endif
                    @if(Auth::user()->rol == 0)
                        <td>{{ $record->fecha_prestamo }}</td>
                    @elseif(Auth::user()->rol == 1)
                        <td>{{ Carbon::parse($record->fecha_prestamo)->format('Y-m-d') }}</td>
                    @endif
                    @if($record->fecha_devolucion == null)
                        <td>Aún no se ha devuelto</td>
                    @else
                        @if(Auth::user()->rol == 0)
                            <td>{{ $record->fecha_devolucion }}</td>
                        @elseif(Auth::user()->rol == 1)
                            <td>{{ Carbon::parse($record->fecha_devolucion)->format('Y-m-d') }}</td>
                        @endif
                    @endif
                    @if(Auth::user()->rol == 0)
                    <td class="d-flex justify-content-around bg-white">
                        <a class="btn btn-sm btn-info w-25 fs-6" href="{{ route('prestamos.show',$record->id) }}"><i
                                class="fa fa-info"></i></a>
                            <a class="btn btn-sm btn-primary w-25 fs-6"
                               href="{{ route('prestamos.edit',$record->id) }}"><i class="fa fa-pencil"></i></a>
                            <form class="w-25 m-0" action="{{ route('prestamos.destroy',$record->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100 m-0 fs-6"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                    </td>
                    @endif
                </tr>
            @endif
        @endforeach
    </table>

    {!! $records->links() !!}
@endsection
