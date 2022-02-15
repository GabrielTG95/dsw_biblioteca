@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ejemplares</h2>
            </div>
        </div>
    </div>
    <a href="{{route('ejemplares.create')}}" class="btn btn-success">{{__('Añadir Ejemplar')}}</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Prestado</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Modificación</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $record->ejemplar_id }}</td>
                <td>{{ $record->isbn }}</td>
                <td>{{ $record->prestado }}</td>
                <td>{{ $record->fecha_creacion }}</td>
                <td>{{ $record->fecha_modificacion }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('ejemplares.show',$record->id) }}">Show</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('ejemplares.edit',$record->id) }}">Edit</a>
                    <form action="{{ route('ejemplares.destroy',$record->id) }}" method="POST">
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
