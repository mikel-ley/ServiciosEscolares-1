uploads externo
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<p style="text-align: center; font-size: 20px"><strong>En esta Seccion se Mostraran los Archivos de los alumnos.</strong></p>

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
            <th>Eliminar</th>
        </thead>
        <tbody>
            @foreach ($externo as $Externo)
            <tr>
                <td scope="row">{{$Externo->id}}</td>
                <td>{{$Externo->name}}</td>
                <td>
                    <a target="_blank" href="{{ route('admin.pasos.dos.show',$Externo->id) }}" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    <a href="{{ route('admin.externo.download',$Externo->id) }}" style="justify-content: center;" class="btn btn-outline-primary"><i class="fa fa-download"></i></a>
                </td>

                <td>
                    <form action="{{ route('admin.pasos.dos.destroy', $Externo->id) }}" class="d-inline" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-folder-minus"></i></button>
                    </form>
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
