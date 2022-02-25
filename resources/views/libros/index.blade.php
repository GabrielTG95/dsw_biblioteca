@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Libros</h2>
            </div>
        </div>
    </div>
    @if(Auth::user()->rol == 0)
        <a href="{{route('libros.create')}}" class="btn btn-success">{{__('Añadir Libro')}}</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ISBN</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Editorial</th>
            <th>Edición</th>
            <th>Fecha de publicación</th>
            <th>Disponibilidad</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->isbn }}</td>
                <td>{{ $record->titulo }}</td>
                <td>{{ $record->autor }}</td>
                <td>{{ $record->categoria }}</td>
                <td>{{ $record->editorial }}</td>
                <td>{{ $record->edicion }}</td>
                <td>{{ $record->fecha_publicacion }}</td>
                @if($record->disponible == 0)
                    <td>Disponible</td>
                @else
                    <td>No Disponible</td>
                @endif
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('libros.show',$record->id) }}">Mostrar</a>
                    @if(Auth::user()->rol == 0)
                    <a class="btn btn-sm btn-primary" href="{{ route('libros.edit',$record->id) }}">Editar</a>
                    <form action="{{ route('libros.destroy',$record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {!! $records->links() !!}
@endsection
