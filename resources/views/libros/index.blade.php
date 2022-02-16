@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Libros</h2>
            </div>
        </div>
    </div>
    <a href="{{route('libros.create')}}" class="btn btn-success">{{__('Añadir Libro')}}</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
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
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $record->isbn }}</td>
                <td>{{ $record->titulo }}</td>
                <td>{{ $record->autor }}</td>
                <td>{{ $record->categoria }}</td>
                <td>{{ $record->editorial }}</td>
                <td>{{ $record->edicion }}</td>
                <td>{{ $record->fecha_publicacion }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('libros.show',$record->isbn) }}">Show</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('libros.edit',$record->isbn) }}">Edit</a>
                    <form action="{{ route('libros.destroy',$record->isbn) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $records->links() !!}
@endsection
