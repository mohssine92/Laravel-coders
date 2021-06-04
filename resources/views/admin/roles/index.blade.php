{{-- estas vistas simple de blade estan extraendo la plantilla de adminLte que hemos instalado ver video de instalacion y configuracion  --}}

@extends('adminlte::page')  {{-- views/adminlte/page : plantilla de adminLte - usa bosstrap asi puedo usar las clases de boostarap --}}

@section('title', 'CodersFree')

@section('content_header')
    <h1>Role List</h1>
@stop

@section('content')

     @if (session('info'))  {{-- validar la varible de session --}}
        <div class="alert alert-info" role="alert">
            <strong>Success!</strong> {{ session('info') }}
        </div>
     @endif
     @if (session('info-deleted'))  {{-- validar la varible de session --}}
        <div class="alert  alert-danger" role="alert">
            <strong>Success!</strong> {{ session('info-deleted') }}
        </div>
     @endif


    <div class="card">

          <div class="card-header">
            {{-- ruta me derige a la ruta a donde voy a implementar formulario para crear roles  --}}
            <a href="{{route('admin.roles.create')}}">Create roles</a>
          </div>

         <div class="card-body">
            <table class="table table-striped">

                <thead>
                   <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th colspan="2"></th>
                   </tr>
               </thead>

               <tbody>
                   {{-- si la coleccion vacio imprime lo edspues del @empty- --}}
                  @forelse ($roles as $role )
                     <tr>
                         <td>{{ $role->id }}</td>
                         <td>{{ $role->name }}</td>

                         <td width="10px">
                             <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                         </td>

                         <td width="10px">
                             {{-- porque ? estamos usando form y no enlace porque esta ruta del controller resource esta definida que esta usando method delete , y la unica forma de para Especificar  que la data le vamos a mandar por metodo delete
                                es el form va por metodo post y dentro especificando atraves de directiva de blade metod delete --}}
                             <form action="{{route('admin.roles.destroy', $role)}}" method="post">
                                  @method('delete')
                                  @csrf {{-- token csrf --}}

                                  <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                         </td>
                     </tr>
                  @empty
                    <tr>
                       <td colspan="4">there is no registered role</td>
                    </tr>
                  @endforelse

               </tbody>

            </table>
         </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
