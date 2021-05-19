{{-- este es template de component de livewire esta usado como controlador , asi este template se injecta en el slot del componente de deseño que estamos usando  , por ello el componete de deseño le esta proviendo todos los scripts
    csss , js , boostrap , tailwwind , etc ....--}}
<div class="mt-8">

     <div class="container grid grid-cols-3 gap-8">


        <div class="col-span-2">
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
              <div class="flex items-center mt-4 cursor-pointer">
                 <i class="fa fa-toggle-off text-2xl text-gray-600"></i>
                 <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
              </div>

              {{-- next / previouse --}}
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

              <p>Inidice {{ $this->index }}</p>   {{-- es una prop computada --}}

              <p>Previous: @if ($this->previous) {{-- es una prop computada --}}
                  {{ $this->previous->id }}
                  @endif
              </p>

              <p>
                  Next: @if ($this->next)  {{-- es una prop computada --}}
                  {{ $this->next->id}}
                @endif
              </p>
        </div>



        <div class="card">
           <div class="card-body">

              <h1>{{ $course->title }}</h1>


              <div class="flex items-center">
                {{-- 2 elementos uno alado del otro  --}}
                <figure> {{-- element 1 --}}
                    <img src="{{$course->teacher->profile_photo_url}}" alt="">
                </figure>

                <div> {{-- element 2 --}}
                  <p>{{ $course->teacher->name }}</p>
                  <a class="text-blue-500" href="">{{ '@'.Str::slug($course->teacher->name, '')}}</a>
                </div>

              </div>

              <ul>
                {{-- secciones --}}
                @foreach ($course->sections as  $key =>$section )
                <li>

                  <a class="font-bold" href="">{{'Seccion '.($key + 1).' :'.$section->name }}</a>

                  <ul>
                       @foreach ($section->lessons as $lesson )
                         {{-- lessons de cada seccion --}}
                         <li>
                             <a  class="cursor-pointer" wire:click="changeLesson({{$lesson}})">
                                 {{ $lesson->id }}@if ($lesson->completed)

                                (completed)
                             @endif
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



