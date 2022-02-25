@extends('layouts.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Libros</h2>
                @isset(Auth::user()->rol)
                    @if(Auth::user()->rol == 0)
                        <a href="{{route('libros.create')}}"
                           class="btn btn-success d-block w-25 ms-auto me-4">{{__('Añadir Libro')}} <i
                                class="fa fa-plus-square"></i></a>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    @endif
                @endisset
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        @foreach ($records as $record)
            <div class="col-lg-3 col-md-5 col-sm-7 col-10 mx-1 mb-4 p-2 shadow">
                <p class="text-end pe-3">
                    @if($record->disponible == 0)
                        <i class="fa fa-check"></i> Disponible
                    @else
                        <i class="fa fa-clock-o"></i> Esperando devolución
                    @endif
                </p>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img class="w-100" src="{{asset('uploads/').'/'.$record->portada}}"
                         alt="Portada del libro {{$record->titulo}}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <p class="fs-5">{{ $record->titulo }}</p>
                    <p class="fs-6">{{ $record->autor }}</p>
                    @foreach ($categorias->all() as $categoria)
                        @if($categoria->id == $record->categoria)
                            <p class="fs-6">{{$categoria->definicion}}</p>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-sm btn-info w-25 fs-5 mx-1 float-start"
                       href="{{ route('libros.show',$record->id) }}"><i class="fa fa-info"></i></a>
                    @isset(Auth::user()->rol)
                        @if(Auth::user()->rol == 0)
                            <a class="btn btn-sm btn-primary w-25 fs-5 mx-1 float-start"
                               href="{{ route('libros.edit',$record->id) }}"><i class="fa fa-pencil"></i></a>
                            <form class="w-25" action="{{ route('libros.destroy',$record->id) }}" method="POST"
                                  onsubmit="return confirm('¿De verdad desea eliminar este libro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mx-1 w-100 fs-5"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach
    </div>
    {!! $records->links() !!}
@endsection
