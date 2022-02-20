<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    public function render()
    {
        return view('kit::toast');
    }
}
