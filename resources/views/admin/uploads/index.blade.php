@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="#" class="float-right" data-toggle="modal" data-target="#ModalCreate"><img style="width: 50px" src="{{ asset('favicons/upload-file.png') }}"></a>


@include('admin.uploads.modal.create')
@stop

@section('content')

<h1>Subir Archivos</h1>
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="p-5 bg-grey rounded shadow-lg">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre De Archivo</th>
            <th>Accion</th>
        </thead>
        <tbody>

            @foreach ($file as $File)
            <tr>
                <td scope="row">{{$File->id}} </td>
                <td>{{$File->name}} </td>
                <td>
                    <a target="_blank" href="{{ route('admin.uploads.show',$File->id) }}" class="btn btn-outline-secondary">Ver</a>
                    <form action="{{ route('admin.uploads.destroy', $File->id) }}" class="d-inline" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
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
