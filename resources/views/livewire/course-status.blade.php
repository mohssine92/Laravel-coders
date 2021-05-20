{{-- este es template de component de livewire esta usado como controlador , asi este template se injecta en el slot del componente de deseño que estamos usando  , por ello el componete de deseño le esta proviendo todos los scripts
    csss , js , boostrap , tailwwind , etc ....--}}
<div class="mt-8">

     <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">


        <div class="lg:col-span-2">

              <div class="embed-responsive">
                  {!!$current->ifram!!} {{-- current es primer lesson incompleto / curso actual --}}
              </div>

              <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{ $current->name }}
              </h1>

              {{-- descripcion del leccion es opcional , pude ser una leccion no tenrer description--}}
              @if ($current->description)
                <div class="text-gray-600">
                   {{$current->description->name}}
                </div>
              @endif

              {{-- marcar la leccion como culminada --}}
              <div class="flex items-center mt-4 cursor-pointer"
                   wire:click="completed"
              >
                  @if ($current->completed)  {{-- la idea curso culminado completed returna true --}}
                     <i class="fa fa-toggle-on text-2xl text-red-700"></i>
                  @else
                    <i class="fa fa-toggle-off text-2xl text-gray-600"></i>
                  @endif

                 <p class="text-sm ml-2">Marcar esta unidad como culminada</p>

              </div>

              {{-- next / previouse / habilitar botones --}}
              <div class="card mt-2">
                <div class="card-body flex text-green-500 font-bold">
                   @if ($this->previous)
                    <a  wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema anterior</a>
                   @endif
                   @if ($this->next)
                    <a  wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente tema</a>
                   @endif
                </div>
             </div>

        </div>



        <div class="card">
           <div class="card-body">

              <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>


              <div class="flex items-center">
                {{-- 2 elementos uno alado del otro  --}}
                <figure> {{-- element 1 --}}
                    <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                </figure>

                <div> {{-- element 2 --}}
                  <p>{{ $course->teacher->name }}</p>
                  <a class="text-blue-500 text-sm" href="">{{ '@'.Str::slug($course->teacher->name, '')}}</a>
                </div>

              </div>

              <p class="text-gray-600 text-sm mt-2">{{ $this->Advance }}% Completed</p>

              {{-- barra navigacion , complimiento del curso --}}
              <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-100">
                  <div style="width:{{ $this->Advance }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-600 transition-all duration-700"></div>
                </div>
              </div>

              <ul>
                {{-- secciones --}}
                @foreach ($course->sections as  $key =>$section )
                <li class="text-gray-600 mb-4">

                  <a class="font-bold text-base inline-block mb-2" href="">{{'Seccion '.($key + 1).' :'.$section->name }}</a>

                  <ul>

                       @foreach ($section->lessons as $lesson )
                         {{-- lessons de cada seccion --}}
                         <li class="flex">
                            <div>  {{-- puntos de progresso  --}}
                               @if ($lesson->completed)

                                     @if ($current->id == $lesson->id)  {{-- lesson actual --}}
                                         <span class="inline-block w-4 h-4 border-2 bg-red-600 rounded-full mr-2 mt-1"></span>
                                     @else
                                         <span class="inline-block w-4 h-4 bg-green-600 rounded-full mr-2 mt-1"></span>
                                     @endif

                                @else

                                   @if ($current->id == $lesson->id)  {{-- lesson actual --}}
                                        <span class="inline-block w-4 h-4 border-2 border-red-600 rounded-full mr-2 mt-1"></span>
                                   @else
                                        <span class="inline-block w-4 h-4 bg-green-100 rounded-full mr-2 mt-1"></span>
                                   @endif

                               @endif
                            </div>
                            <a  class="cursor-pointer" wire:click="changeLesson({{$lesson}})">
                                {{ $lesson->name }}
                            </a>
                         </li>
                       @endforeach

                    </ul>

                </li>
                @endforeach
              </ul>

           </div>
        </div>

     </div>


</div>



