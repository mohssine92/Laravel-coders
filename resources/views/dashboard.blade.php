<x-app-layout>                    {{--  vista dashboard de jestream su estructura esta creada por componentes de blade  --}}


     {{-- slot --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />  {{-- inst comp de blde jestream x-jet --}}
            </div>
        </div>
    </div>


</x-app-layout> {{-- esta es la forma de llamar componentes de blade , sea componente de classe o componente anonimo  --}}
