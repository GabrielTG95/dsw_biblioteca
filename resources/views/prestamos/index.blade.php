@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prestamos</h2>
            </div>
        </div>
    </div>
    <a href="{{route('prestamos.create')}}" class="btn btn-success">{{__('Añadir Prestamo')}}</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ISBN</th>
            <th>Usuario</th>
            <th>Título</th>
            <th>Fecha del prestamo</th>
            <th>Fecha de devolución</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $record->libro_id }}</td>
                <td>{{ $record->usuario }}</td>
                <td>{{ $record->fecha_prestamo }}</td>
                @if($record->fecha_devolucion == null)
                    <td>Aún no se ha entregado</td>
                @else
                    <td>{{ $record->fecha_devolucion }}</td>
                @endif
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('prestamos.show',$record->id) }}">Ver Más</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('prestamos.edit',$record->id) }}">Editar</a>
                    <form action="{{ route('prestamos.destroy',$record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $records->links() !!}
@endsection
