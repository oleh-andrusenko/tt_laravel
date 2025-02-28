<?php

namespace App\View\Components;

use App\Models\Rent;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RentTile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Rent $rent,
        public readonly ?User $user
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rent-tile');
    }
}
