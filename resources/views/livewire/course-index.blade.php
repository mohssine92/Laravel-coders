<div>

      {{-- borra de navigacion con tres butones  --}}
     <div class="bg-gray-200 py-4 mb-16">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex ">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 ">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los coursos
            </button>

            {{-- usamos alpine libreria para rectividad del dropdown video : 15 min 20 --}}
            <div class="relative mr-4" x-data="{ open: false }">

                <button class=" px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                   <i class="fas fa-tags text-sm mr-2"></i>
                      Categoria
                   <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                 {{-- cuerpo curpo Dropdown--}}
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show='open' x-on:click.away="open = false">
                  <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">
                      Settings
                  </a>
                  <div class="py-2">
                    <hr></hr>
                  </div>

                <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">
                  Logout
                </a>
              </div>
               {{-- / cuerpo curpo Dropdown--}}

           </div>

             {{-- usamos alpine libreria  rectividad del dropdown video : 15 min 20 --}}
             <div class="relative" x-data="{ open: false }">

                <button class=" px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                   <i class="fas fa-tags text-sm mr-2"></i>
                      Niveles
                   <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                 {{-- cuerpo curpo Dropdown--}}
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show='open' x-on:click.away="open = false">
                  <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">
                      Settings
                  </a>
                  <div class="py-2">
                    <hr></hr>
                  </div>

                <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">
                  Logout
                </a>
              </div>
               {{-- / cuerpo curpo Dropdown--}}

           </div>





        </div>

     </div>

     {{--copiado from welcoom.blade --}}
     <section>

         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)

                <article class="bg-white shadow-lg rounded overflow-hidden ">

                    <img class="h-36 w-full object-cover"  src="{{ Storage::url($course->image->url) }}" alt="">

                    <div class="px-6 py-4">

                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title,40, '...') }}</h1>

                        <p class="text-gray-500 text-sm mb-2">Prof : {{ $course->teacher->name }}</p>

                        <div class="flex">
                            {{-- flex =>  dos ewlementos hijos en linea  --}}
                           <ul class="flex text-sm">
                              <li class="mr-1">
                                  <i class="fas fa-star text-{{ $course->rating >=1 ? 'yellow' : 'gray' }}-400"></i>
                              </li>
                              <li class="mr-1">
                                  <i class="fas fa-star text-{{ $course->rating >=2 ? 'yellow' : 'gray' }}-400"></i>
                              </li>
                              <li class="mr-1">
                                  <i class="fas fa-star text-{{ $course->rating >=3 ? 'yellow' : 'gray' }}-400"></i>
                              </li>
                              <li class="mr-1">
                                 <i class="fas fa-star text-{{ $course->rating >=4 ? 'yellow' : 'gray' }}-400"></i>
                              </li>
                              <li class="mr-1">
                                  <i class="fas fa-star text-{{ $course->rating ==5 ? 'yellow' : 'gray' }}-400"></i>
                              </li>
                           </ul>

                           <p class="text-sm text-gray-500 ml-auto">
                               <i class="fas fa-users"></i>
                              ({{ $course->students_count }})
                           </p>

                        </div>

                        <a href="{{ route('courses.show', $course) }}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Mas informacion
                        </a>


                    </div> {{-- texto voy a permitir que se muestra 40 caracteres , esta largo ,uso de metodo de la clase Str --}}

                </article> {{-- tarjeta --}}

            @endforeach


         </div>{{-- estos clases sentralizan la caja  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8--}}

     </section>

     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">

        {{-- Link de paginacion video 15 min 28--}}
        {{$courses->links() }}

     </div>
</div>
