@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="{{route('admin.alumnos.index')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-check"></i></a>
    <p style="text-align: center; font-size: 20px">Una vez completos los datos de los formatos, sube nuevamente los archivos,
    no olvides revisar minuciosamente la información requerida en cada uno de ellos, pues es requisito indispensable del servicio social.
    </br> <strong>Una ves Cargado tu formato da click en el boton verde.</strong></p>

    <a href="#" class="float-right" data-toggle="modal" data-target="#ModalCreate"><img style="width: 50px" src="{{ asset('favicons/upload-file.png') }}"></a>


@include('admin.pasos.dos.modal.create')

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
            <th>Nombre Archivo</th>
        </thead>
        <tbody>

            @foreach ($externo as $Externo)
            <tr>
                <td scope="row">{{$Externo->id}} </td>
                <td>{{$Externo->name}} </td>
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
