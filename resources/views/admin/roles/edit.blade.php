{{-- estas vistas simple de blade estan extraendo la plantilla de adminLte que hemos instalado ver video de instalacion y configuracion  --}}
@extends('adminlte::page')

@section('title', 'CodersFree')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
     <div class="card">
         <div class="card-body">

            {!! Form::model( $role ,['route' => ['admin.roles.update', $role], 'method' => 'put' ]) !!}   {{--https://laravelcollective.com/docs/6.x/html - form:model + objeto a editar 1 arg , me rellena formulario rapido y sencillo ,  dispara 2 objetos $role y $request --}}

            @include('admin.roles.partials.form')

            {!! Form::submit('Edit role', ['class' =>'btn btn-primary mt-2']) !!}


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
