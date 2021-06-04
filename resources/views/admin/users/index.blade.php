{{-- vista simple de blade rederizada por parte de metodo de controller resource --}}

@extends('adminlte::page')

@section('title', 'CodersFree')

@section('content_header')
    <h1>Users list</h1>
@stop

@section('content')
    {{-- renderizar componnete de livewire Livewire/AdminUsers --}}
    @livewire('admin-users')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
