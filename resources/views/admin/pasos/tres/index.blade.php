@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<x-adminlte-progress id="pbDinamic" value="100" theme="lighblue" animated />
    <h1>Paso tres</h1>
@stop

@section('content')



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
