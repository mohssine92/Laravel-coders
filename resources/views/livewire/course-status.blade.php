<div class="mt-8">

     <div class="container grid grid-cols-3 gab-8">


        <div class="col-span-2">
            {!!$current->ifram!!} {{-- current es primer lesson incompleto --}}
            {{ $current->name }}

            <p> Previous: @if ($this->previous) {{-- es una prop computada --}}
                {{ $this->previous->id }}
                @endif
            </p>

            <h1>{{ $this->index }}</h1>   {{-- es una prop computada --}}

            <p>
                Next: @if ($this->next)  {{-- es una prop computada --}}
                {{ $this->next->id }}
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



