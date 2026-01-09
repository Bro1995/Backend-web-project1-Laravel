<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Render the guest layout.
     * This layout is used for visitors who are not logged in.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
