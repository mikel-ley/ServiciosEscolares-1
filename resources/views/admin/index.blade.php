@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard </h1>
@stop

@section('content')

<div class="row">
    <div class="col-sm-4">
        <div class="card bg-secondary mb-3">
            <div class="card-body">
                <h1 class="card-text text-center">Usuarios</h1>
            <h1 class="card-title"><i class="fa fa-users fa-5x"></i><span style="font-size:5em;"></span></h1><br>
            {{-- <a href="#" class="btn btn-primary"></a>--}}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card bg-secondary mb-3">
            <div class="card-body">
                <h1 class="card-text text-center">Empresas</h1>
            <h1 class="card-title"><i class="fa fa-building fa-5x"></i><span style="font-size:5em;"></span></h1><br>
            {{-- <a href="#" class="btn btn-primary"></a>--}}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
      <div class="card bg-secondary mb-3">
        <div class="card-body">
            <h1 class="card-text text-center">Archivos</h1>
          <h1 class="card-title"><i class="fa fa-archive fa-5x"></i><span style="font-size:5em;"></span></h1><br>
          {{-- <a href="#" class="btn btn-primary"></a>--}}
        </div>
      </div>
    </div>

    <div class="col-sm-4">
        <div class="card bg-secondary mb-3">
          <div class="card-body">
              <h1 class="card-text text-center">Internos</h1>
            <h1 class="card-title"><i class="fa fa-archive fa-5x"></i><span style="font-size:5em;"></span></h1><br>
            {{-- <a href="#" class="btn btn-primary"></a>--}}
          </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card bg-secondary mb-3">
          <div class="card-body">
              <h1 class="card-text text-center">Externos</h1>
            <h1 class="card-title"><i class="fa fa-archive fa-5x"></i><span style="font-size:5em;"></span></h1><br>
            <div style="top: 50px">
                <a href="{{ route('admin.alumnos.index') }}" class="btn btn-primary">Más Info</a>
            </div>
          </div>
        </div>
      </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
