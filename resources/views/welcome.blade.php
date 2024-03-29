
<x-app-layout>  {{-- Componente de blade , aqui tenemos nuestra plantilla principal de jetstream de de aqui extendemos --}}

   {{-- seccion 1   video : 14 hasta min : 16:50     --}}
   <section class="bg-cover" style="background-image: url( {{asset('img/home/people-2557396_1920.jpg')}} )">  {{-- bg-cover : img bg occupe todo ancho mejor posible  --}}
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">  {{-- class para ecntar contenido  --}}
        <div class="w-full md:w-3/4 lg:w-1/2"> {{-- % a occupar por pantalla --}}
            <h1 class="text-white font-fold text-4xl">Domina la tecnologia web con CodersFree</h1>
            <p class="text-white text-lg mt-2 mb-4">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>

             @livewire('search')

        </div>
      </div>
   </section>

   {{-- seccion 2 video : desde min 16:50 hasta min 27.53 --}}
   <section class="mt-24">
       <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
          <article>
            <figure>
                 <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/code-944504_640.jpg') }}" alt="">
             </figure>

            <header class="mt-2">  {{-- lo ponemos en header por tema de seo  --}}
                <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
            </header>

            <p class="text-sm text-gray-500"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea asperiores excepturi soluta!</p>

          </article>

          <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/coding-699318_640.jpg') }}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
            </header>

            <p class="text-sm text-gray-500"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea asperiores excepturi soluta!</p>

         </article>

         <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/webdesigner-2443766_640.jpg') }}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700">Blog</h1>
            </header>

            <p class="text-sm text-gray-500"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea asperiores excepturi soluta!</p>

         </article>

         <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/red-matrix-5031496_640.jpg') }}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
            </header>

            <p class="text-sm text-gray-500"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea asperiores excepturi soluta!</p>

         </article>

       </div>
   </section>

   {{-- section 3 dede min 27:53 hasta min 32:28 --}}
   <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo de cursos
            </a>
        </div> {{-- este div para centarr button --}}

   </section>

   {{-- seccion 4 desde min:32:28  hasta el final de video 14--}}
   <section class="my-24 ">

     <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>

     <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>

     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)

         <x-course-card :course="$course" /> {{-- : antes de course paraque reconosca que es una variable de php --}}

        @endforeach


     </div>{{-- estos clases sentralizan la caja  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8--}}

   </section>



</x-app-layout>

