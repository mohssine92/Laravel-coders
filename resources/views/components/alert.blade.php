<div {{ $attributes->merge(['class' => "bg-$color-100  border-l-4 border-$color-500 text-$color-700 p-4" ]) }} role="alert">
    <p class="font-bold">{{ $title }}</p>

    <p>{{ $slot }}</p>
    <p>{{ $prueba() }}</p>

</div>
 {{--  div toma la class=""  primira declarada y ignora attributo segundo , yo quiero que las dos class no uno sobreescriba otro sino se funccionen se mezclan --}}
  {{-- imprima siempre lo que viene en attributtes pero adicionalmente siempre quiero comenzar con ciertas classes tomar los dos classses los mezcla uso de merge  --}}
