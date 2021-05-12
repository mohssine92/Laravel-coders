

    <form class="pt-2 relative mx-auto text-gray-600 border-gray-500 " autocomplete="off">


        <input class="w-full  border-0  border-gray-300  bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none "
        type="search" name="search" placeholder="Search"
        wire:model="search" {{-- canal abierto propiedad de classe y caja input  --}}
        >



       <button  type="submit" class="bg-green-300 hover:bg-green-500 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2  focus:outline-none">
           Buscar
       </button>

       @if ($search)  {{-- Evitar recupera todos registros en caso $search undefined  --}}

        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden ">
           @forelse ($this->results as $result )
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-green-300">
                <a href="{{route('courses.show',$result)}}">{{$result->title}}</a>
            </li>
            @empty
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-green-300">
               No hay ninguna coincidencia :(
            </li>
           @endforelse

        </ul>

       @endif



    </form>



