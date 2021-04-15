
<x-app-layout> {{-- todo contenido que va tener nuestra pagina web se va tentro del tag  , este es componente principal , se imprime en slot--}}

   <section class="bg-cover" style="background-image: url( {{asset('img/home/people-2557396_1920.jpg')}} )">  {{-- bg-cover : img bg occupe todo ancho mejor posible  --}}
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2"> {{-- % a occupar por pantalla --}}
            <h1 class="text-white font-fold text-4xl">Domina la tecnologia web con CodersFree</h1>
            <p class="text-white text-lg mt-2 mb-4">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>

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

</x-app-layout>

