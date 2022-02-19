<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class Tabs extends Component
{
    public array $tabHeaders;

    public function __construct(array $tabHeaders)
    {
        $this->tabHeaders = $tabHeaders;
    }

    public function render()
    {
        return view('kit::tabs');
    }
}
