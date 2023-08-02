@extends('adminlte::page')

@section('title', 'Correos Masivos')

@section('content_header')
    <h1>Personas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary btn-sm" href="{{route('admin.people.create')}}">Añadir persona</a>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{$person->id}}</td>
                            <td>{{$person->name}}</td>
                            <td>{{$person->email}}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm" href="{{route('admin.people.edit', $person)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.people.destroy', $person)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-danger btn-sm" type="submit">Eliminar</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
