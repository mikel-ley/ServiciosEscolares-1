@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard </h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-4">
        <x-adminlte-small-box title="{{ $cant_users }}" text="Users" icon="fas fa-user-plus text-teal fa-5x"
        theme="primary" url="{{ route('admin.users.index') }}" url-text="Ver Todos los Usuarios"/>
    </div>

    <div class="col-md-4">
        <x-adminlte-small-box title="424" text="Externos" icon="fa fa-building text-white fa-5x"
        theme="secondary" url="{{ route('admin.alumnos.index') }}" url-text="Darse de Alta"/>
    </div>

    <div class="col-md-4">
        <x-adminlte-small-box title="nada" text="Internos" icon="fa fa-university"
        theme="teal" url="#" url-text="Más Info"/>
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
