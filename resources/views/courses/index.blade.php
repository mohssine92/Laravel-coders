{{-- Vista normal --}}
<x-app-layout>
  {{-- todo contenido interior se imprima en el posicion del slot de este componente  --}}


      {{-- seccion 1  copiado desde welcomBlade  => video 15 min 5:33     --}}
      <section class="bg-cover" style="background-image: url( {{asset('img/cursos/computer-1873831_1920.PNG')}} )">  {{-- bg-cover : img bg occupe todo ancho mejor posible  --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">  {{-- class para ecntar contenido  --}}
          <div class="w-full md:w-3/4 lg:w-1/2"> {{-- % a occupar por pantalla --}}
              <h1 class="text-white font-fold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español.</h1>
              <p class="text-white text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>

              @livewire('search')

          </div>
        </div>
      </section>

      @livewire('course-index')






</x-app-layout>
