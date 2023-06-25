<?php

namespace App\View\Components;

use Illuminate\View\Component;

class back-to-warebill-set extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.back-to-warebill-set');
    }
}
