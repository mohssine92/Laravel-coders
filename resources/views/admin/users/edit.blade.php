{{-- vista simple de blade rederizada por parte de metodo de controller resource --}}

@extends('adminlte::page')

@section('title', 'CodersFree')

@section('content_header')
    <h1>Assign a role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Name:</h1>
            <p class="form-control">{{ $user->name }}</p> {{-- esta class paraque se vea en forma de un input --}}

            <h1 class="h5">Role List</h1> {{--quiero  debajo de h1 parecen todos listados de roles , asi debe restacarlos en el metodo que rederiza esta vista  ... --}}

             {{-- https://laravelcollective.com/docs/6.x/html : para mas informacion paquete permite construir formularios rapidamente --}}
             {{-- abrir formulario , este formo dispara dos objetos , $user y objeto cuerpo del form --}}
            {!! Form::model($user, ['route' => ['admin.users.update', $user] , 'method' => 'put']) !!}

                @foreach ($roles as $role )
                   <div> {{-- paraque cada checkbox occupa una linea lo pongo dentro de este div --}}
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                     </label>
                   </div>
                @endforeach

               {!! Form::submit('Assign Role', ['class' => 'btn btn-primary']) !!}
            {{-- cerra el formulario --}}
            {!! Form::close() !!}



        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
