@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Externo</h1>
@stop

@section('content')
<a href="{{ route('admin.pasos.tres.index') }}"><x-adminlte-button label="Paso uno"  theme="secondary" icon="fas fa-info-circle"/> </a> 
   <p></p>  <a href="{{ route('admin.pasos.dos.index') }}"><x-adminlte-button label="Paso Dos" theme="secondary" icon="fas fa-info-circle"/></a>
   <p></p> <a href="{{ route('admin.pasos.index') }}"><x-adminlte-button label="Paso tres" theme="secondary" icon="fas fa-info-circle"/></a>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
