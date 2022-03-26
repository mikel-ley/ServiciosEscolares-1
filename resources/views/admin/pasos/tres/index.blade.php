@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<a href="{{route('admin.alumnos.index')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-check"></i></a>
    <p style="text-align: center; font-size: 20px">En este Ultimo paso se enviará en la misma pagina o a tu correo la carta de presentación de la empresa que deberás entregar al inicio de tú servicio social.
    </br> <strong>Una ves Finalizado los tres pasos con exito da click en el boton verde.</strong></p>

    
@stop

@section('content')



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
