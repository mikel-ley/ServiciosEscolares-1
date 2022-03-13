<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Búsqueda de usuario">
        </div>
        @if($users->count())
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Matricula</th>
                        <th>Carrera</th>
                        <th>Modalidad</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{ $user->matricula }}</td>
                            <td>{{ $user->carrera }}</td>
                            <td>{{ $user->modalidad }}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px;">
                                <a class="btn btn-primary" href="{{ route('admin.users.edit',$user) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="flex flex-row mt-2 card-footer">
                {{$users->links('pagination::bootstrap-4')}}
            </div>
        @else
            {{--https://adminlte.io/themes/dev/AdminLTE/pages/UI/general.html--}}
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> No hay resultados</h5>
                    Intente teclear otra palabra
                </div>
            </div>
        @endif

    </div>
</div>
