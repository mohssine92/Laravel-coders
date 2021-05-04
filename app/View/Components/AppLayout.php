<?php

namespace App\View\Components;

use Illuminate\View\Component;


/* <x-app-layout> */
class AppLayout extends Component     /* php artisan make:component  */
{
    /**
     * Get the view / contents that represents the component. Plantilla princiapl
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');

    }
}
