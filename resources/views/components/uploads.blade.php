<div class="container mt-5">

    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        Session::get('success')
    </div>
    @endif

</div>

<div class="p-5 bg-grey rounded shadow-lg">

        @csrf

        {!! Form::open(['route'=>['admin.uploads.store'],'method'=>'POST','files'=>true]) !!}

            <div class="form-group">

                {!! Form::label('name','Documento') !!}<br>
                {!! Form::File('files[]', null, ['class'=>'form-control', 'required' => 'required']) !!}
            </div>

        {!! Form::submit('GUARDAR',['class'=>'btn btn-outline-success btn-sm']) !!}
        {!! Form::close() !!}
</div>
