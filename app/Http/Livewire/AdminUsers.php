<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\User; // el objeto se detecta por id por defecto , se puede reescribir la prop interna para identificar objeto como es el caso de objeto curse

// importacion , si queremos la paginacion que nos proporciona livewir , sin eventos a url , es igual que angular react etc ..
use Livewire\WithPagination;

/*
  para crear data table , primer uso en admin.users , rutas esta en archivo de admin
  php artisan make:livewire admin-users : en este caso se trata de componente de livewire , no de componente de livewir con rol de controller de ruta
  - recordar en la config adminlte hemos pasado la prop livwewire a true , asi podemos usar , alpine , livewire se cargan de form automatica , no olvidar cuando estaba en false solo tarbajamos con bosstrap .
*/


class AdminUsers extends Component
{


    use WithPagination;
   /* la prop que indica numero de pagina que nos encontramos esta definida withPagination , el buscador siempre busca apartir de la pagina que nos encontramos a delante , esto nos hace problema , al buscar nombre existe en la pagina uno y la busque por ejemple
      se hace apartir de pagina 2 o 3 adelante hace que el objeto buscado no se encuentra , la solucion es redefinir el comportamiente y que la busqueda se hace siempre desde la pagina numero uno  */


    // debido que laravel se ha desañado los links de navigacion ->(links) con taylwind y nosotros estamos trabajando en admiblte con boostrap , debemos declara esta prop para usar los estilos de boostrap en links de forma predeterminada
    protected $paginationTheme = "bootstrap";

    //variable sincronizada con el input , se intera se escribimos algo
    // va ser usada para filtrar las consultas eloquent a la db Mysql
    public $search;

    public function render()
    {
        // recupera todos objetos users bajo filtros
        $users = User::where('name', 'LIKE', '%' . $this->search . '%') // filtrar por nombre dinamico sincronizado , gracias al componente de livewire
                       ->orWhere('email', 'LIKE', '%' . $this->search . '%' ) // tambien filtro por email
                       ->paginate(8); // paginar 8 en 8

        return view('livewire.admin-users', compact('users'));
    }


    // resolver problema del buscador con Withpagination .
    // cando se dispara este metodo ? - cuando yo empieza a escribir algo en el input buscador
    public function limpiar_page(){
        $this->reset('page');
    }
}
