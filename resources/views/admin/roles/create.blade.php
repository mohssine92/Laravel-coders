{{-- estas vistas simple de blade estan extraendo la plantilla de adminLte que hemos instalado ver video de instalacion y configuracion  --}}
@extends('adminlte::page')

@section('title', 'CodersFree')

@section('content_header')
    <h1>create new role</h1>
@stop

@section('content')

  <div class="card">
      <div class="card-body">

        {!! Form::open(['route' => 'admin.roles.store']) !!}   {{--https://laravelcollective.com/docs/6.x/html - metthod por defect post - token csrf incluido occulto por defecto  --}}

         @include('admin.roles.partials.form')

         {!! Form::submit('create new role', ['class' =>'btn btn-primary mt-2']) !!}


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
