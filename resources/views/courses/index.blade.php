{{-- rendizar componente principal , el que contiene nuestra plantilla princiapl --}}
<x-app-layout>
  {{-- todo contenido interior se imprima en el posicion del slot de este componente  --}}


      {{-- seccion 1  copiado desde welcomBlade  => video 15 min 5:33     --}}
      <section class="bg-cover" style="background-image: url( {{asset('img/cursos/computer-1873831_1920.PNG')}} )">  {{-- bg-cover : img bg occupe todo ancho mejor posible  --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">  {{-- class para ecntar contenido  --}}
          <div class="w-full md:w-3/4 lg:w-1/2"> {{-- % a occupar por pantalla --}}
              <h1 class="text-white font-fold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español.</h1>
              <p class="text-white text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>

              <div class="pt-2 relative mx-auto text-gray-600">

                 <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="Search">

                  <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2  focus:outline-none">
                      Buscar
                  </button>


             </div>

          </div>
        </div>
      </section>

      @livewire('course-index')






</x-app-layout>
