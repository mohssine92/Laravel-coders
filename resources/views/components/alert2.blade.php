{{-- Componente anonimo - nada mas crear esta vista ya hemos creado un componente sin necisidad de generar uns classe por eso lo llaman componente anonimo  --}}


{{-- directiva de blade , como no tengo clase para recibir prop mandadas del tagComponent la recibo aqui - --}}
@props(['color' => 'red' ])


<div role="alert" >
    <div {{ $attributes->merge(['class'=>"bg-$color-500 text-white font-bold rounded-t px-4 py-2"]) }} >
        {{ $title }}
    </div>
    <div class="border border-t-0 border-{{ $color }}-400 rounded-b bg-{{ $color }}-100 px-4 py-3 text-{{ $color }}-700">
      <p> {{ $slot }}</p>
    </div>
  </div>
