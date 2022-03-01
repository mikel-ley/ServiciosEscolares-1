@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{route('admin.pasos.tres.index')}}" class="btn btn-secondary btn-sm float-right">Paso 3</a>
    <a href="{{route('admin.pasos.dos.index')}}" class="btn btn-secondary btn-sm float-right">Paso 2</a>
    <a href="{{route('admin.pasos.index')}}" class="btn btn-secondary btn-sm float-right">Paso 1</a>

    <h1>Externo</h1>
@stop

@section('content')



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
