{{-- esta vista fue generado por la reutulizacion de los elementos en los formularios post delet edit los canpos son estos, sera incluida atraves directiva de blade @include --}}
{{-- esta es vista simple de blade  --}}


<div class="from-froup">
    {!! Form::label('name', 'Name:') !!}  {{-- 3 args [options] , como agregar classes al label --}}
    {!! Form::text('name', null, ['class' => 'form-control '  . ($errors->has('name') ? 'is-invalid' : '')  , 'placeholder' => 'Create name of Role' ]) !!}

    {{-- directiva de blade , imprimir error de validacion --}}
    @error('name')  {{-- esta class  invalid-feedback necesita si o si  is-invalid si no mostrara message--}}
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



<strong>Permisos</strong>

@error('permissions') {{-- aqui obtenemos lo msmo con estos clases  --}}
 <br>
<small class="text-danger">
     <strong>{{ $message }}</strong>
 </small>
 <br>
@enderror


@foreach  ($permissions as $permission )
 <div>  {{-- he cerrado label dentro del div paraque cada uno occupa una linea  --}}
     <label>
         {!! Form::checkbox('permissions[]', $permission->id, null , ['class' => 'mr-1']) !!} {{-- 3 arg si quiero checkear alguno por defecto --}}
         {{$permission->name}}
    </label>
 </div>
@endforeach
