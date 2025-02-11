<?php

namespace App\View\Components;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarRecordComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Car $car
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-record-component');
    }
}
