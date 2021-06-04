{{-- estas vistas simple de blade estan extraendo la plantilla de adminLte que hemos instalado ver video de instalacion y configuracion  --}}
@extends('adminlte::page')

@section('title', 'CodersFree')

@section('content_header')
    <h1>CodersFree</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

