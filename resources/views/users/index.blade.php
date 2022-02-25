@extends('layouts.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Usuarios</h2>
                @if(Auth::user()->rol == 0)
                    <a href="{{route('users.create')}}"
                       class="btn btn-success d-block w-25 ms-auto me-4">{{__('Añadir Usuario')}} <i
                            class="fa fa-plus-square"></i></a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        @foreach ($records as $record)
            <div class="col-lg-3 col-md-5 col-sm-7 col-10 mx-1 mb-4 p-2 shadow">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img class="w-100" src="{{asset('uploads/').'/'.$record->imagen}}"
                         alt="Imagen de perfil del usuario {{$record->name}}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <p class="fs-5">{{ $record->name }}</p>
                    <p class="fs-6">{{ $record->email }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-sm btn-info w-25 fs-5 mx-1 float-start"
                       href="{{ route('users.show',$record->id) }}"><i class="fa fa-info"></i></a>
                    @if(Auth::user()->rol == 0)
                        <a class="btn btn-sm btn-primary w-25 fs-5 mx-1 float-start"
                           href="{{ route('users.edit',$record->id) }}"><i class="fa fa-pencil"></i></a>
                        <form class="w-25" action="{{ route('users.destroy',$record->id) }}" method="POST" onsubmit="return confirm('¿De verdad desea eliminar este libro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-1 w-100 fs-5"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    {!! $records->links() !!}
@endsection
