@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios</h2>
            </div>
        </div>
    </div>
    <a href="{{route('users.create')}}" class="btn btn-success">{{__('Añadir Usuario')}}</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha de creación</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->email }}</td>
                @if($record->rol == 0)
                    <td>Administrador</td>
                @else
                    <td>Alumno</td>
                @endif
                <td>{{ $record->created_at }}</td>
                <td>
                    <a class="btn btn-sm btn-info d-block mb-1" href="{{ route('users.show',$record->id) }}">Ver Más</a>
                    <a class="btn btn-sm btn-primary d-block mb-1" href="{{ route('users.edit',$record->id) }}">Editar</a>
                    <form class="w-100" action="{{ route('users.destroy',$record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger w-100 m-0">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $records->links() !!}
@endsection
