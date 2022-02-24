@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios</h2>
            </div>
        </div>
    </div>
    <a href="{{route('usuarios.create')}}" class="btn btn-success">{{__('Añadir Usuario')}}</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Fecha de creación</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->usuario_id }}</td>
                <td>{{ $record->nombre }}</td>
                <td>{{ $record->email }}</td>
                <td>{{ $record->created_at }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('usuarios.show',$record->usuario_id) }}">Show</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('usuarios.edit',$record->usuario_id) }}">Edit</a>
                    <form action="{{ route('usuarios.destroy',$record->usuario_id) }}" method="POST">
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
