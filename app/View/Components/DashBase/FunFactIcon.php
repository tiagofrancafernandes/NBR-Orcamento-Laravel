<?php

namespace App\View\Components\DashBase;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FunFactIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dash-base.fun-fact-icon');
    }
}
