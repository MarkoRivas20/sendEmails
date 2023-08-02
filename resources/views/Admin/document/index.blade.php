@extends('adminlte::page')

@section('title', 'Correos Masivos')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.document.store', 'files' => true]) !!}

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        {!! Form::label('file', 'Documentos que se agregarán al sistema') !!}
                        {!! Form::file('stock_file[]', ['class' => 'form-control-file', 'multiple' => true]) !!}
                    </div>
                    <div class="d-flex">
                        {!! Form::submit('Agregar documentos', ['class' => 'btn btn-primary mr-2']) !!}
                        <button class="btn btn-danger" type="button" onclick="deleteAllDocuments()">Borrar todos los documentos</button>
                    </div>
                </div>
            {!! Form::close() !!}

            <hr>

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{$document->id}}</td>
                            <td>
                                <a href="{{url('/storage/'.$document->url)}}" target="_blank">{{$document->name}}</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
