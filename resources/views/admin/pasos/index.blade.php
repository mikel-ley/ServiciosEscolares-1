@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="{{route('admin.alumnos.index')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-check"></i></a>

<p style="text-align: center; font-size: 20px">Lo primero que debes hacer es descargar los formatos y llenarlos con la información que se solicita.</br> <strong>Una ves descargado tu formato da click en el boton verde.</strong></p>

@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="p-5 bg-grey rounded shadow-lg">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Archivo</th>
            <th>Ver</th>
            <th>Descargar</th>
        </thead>
        <tbody>

            @foreach ($file as $File)
            <tr>
                <td scope="row">{{$File->id}} </td>
                <td>{{$File->name}} </td>
                <td>
                    <a target="_blank" href="{{ route('admin.uploads.show',$File->id) }}" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    <a href="{{ route('admin.download',$File->id) }}" style="justify-content: center;" class="btn btn-outline-primary"><i class="fa fa-download"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stop
