<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Dashbar extends Component
{
    public $userName;
    public $userEmail;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->userName = Auth::user()->name;
        $this->userEmail = Auth::user()->email;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashbar');
    }
}
