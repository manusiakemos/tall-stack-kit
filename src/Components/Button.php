<?php

namespace TallStackKit\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $variant;

    public function __construct($variant = "rounded")
    {
        $this->variant = $variant;
    }

    public function render()
    {
        return view('kit::button');
    }
}
