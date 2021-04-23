<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\course;
use App\Models\category;
use App\Models\Level;

use Livewire\WithPagination;

/* personalizar filtro de elequent , si las prop estan nulos No ejecute consulata where()  */
/* componente livewire es igual que un componente de angular es rectivo  */
/* componente de blade es solo para reutulizacion de html y estilos nada mas  */
class CourseIndex extends Component
{

  /* anularemos paginacion clasico y usamos paginacion dinamico  */
  use WithPagination;


   /*cualquier prop public se puede usar en la vista del componente */
   public $category_id;
   public $level_id;



    /* por defecto , cualquier prop de este componente sufre cambio por sincronia , se actuzaliza el metodo de render() / video:16 min 14 */
    public function render()
    {

        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status', 3)
                           ->category( $this->category_id ) /* scope filter */
                           ->level( $this->level_id ) /* personalizar filtro */
                           ->latest('id')
                           ->paginate(8);



        return view('livewire.course-index', compact('courses','categories','levels'));
    }

    public function resetFilters(){
       $this->reset('category_id', 'level_id');
    }
}
