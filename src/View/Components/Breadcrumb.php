<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('kit::breadcrumb');
    }
}
