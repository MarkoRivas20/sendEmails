@extends('adminlte::page')

@section('title', 'Correos Masivos')

@section('content_header')
    <h1>Enviar correo</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.email.send']) !!}

                <div class="form-group">
                    {!! Form::label('subject', 'Asunto') !!}
                    {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el asunto del correo']) !!}

                    @error('subject')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el mensaje general']) !!}

                    @error('body')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                {!! Form::submit('Enviar correos', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );

</script>
@endsection