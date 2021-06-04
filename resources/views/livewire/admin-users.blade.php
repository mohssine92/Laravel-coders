{{-- esta es vista de un componente de livewire consta de class perzonalziada , este componente para tener tabla y buscador puedo copiar su logica y meterla en otro componnete de livewire generado y cambiar nombre de campos en funccion del objeto
    producto de que se trata el desarollo . y se necesito misma tabla lo renderizo como eses este caso . --}}
<div>

   <div class="card">

        {{-- buscador --}}
        <div class="card-header">
           <input
            wire:model="search" {{-- sicronizacion de la variabel  --}}
            wire:keydown="limpiar_page" {{-- este evento : cada tecla en el input se dispara , asi el proplema del buscador esta resuelta  --}}
            class="form-control w-100" placeholder="write a name..." >
        </div>


       {{-- surge la necesidad de esta condicion es cuando el buscador no encuentra registros segun los filtro :no mostrar tabla y Mostrar mensaje --}}

      @if($users->count()) {{--Metodo count me va devolver la cantidad de registros que hay en esta colleccion , si no hay nada va fallar la condicion y no se cumpla --}}

        {{-- cuerpo de la tabla --}}
       <div class="card-body">
           <table class="table table-striped">

             <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th></th>
                  </tr>
             </thead>

             <tbody>
                  @foreach ($users as $user )
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td width="10px"> {{-- paraque se abarca a la derecha  --}}
                              <a class="btn btn-info" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                          </td>
                      </tr>
                  @endforeach

             </tbody>

            </table>
       </div>
       {{-- paginacion --}}
       <div class="card-footer">
          {{ $users->links() }}
       </div>
     @else
       <div class="card-body">
            <strong>No hay registros...</strong>
       </div>
     @endif

   </div>

</div>
