<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $color;

    /**
     * creat new component of Blade ,  php artisan make:component Alert
     * Create a new component instance.   <x-alert/>  mthode render() renderiza contenido al tag   <x-alert/>
     *
     * @return void
     */
    public function __construct($color = 'red')
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

     /* todas prop asignadas en esta class seran accedidas de la vista del componente */
    public function render()
    {
        return view('components.alert');
    }
}
