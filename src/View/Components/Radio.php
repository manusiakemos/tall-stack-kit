<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public array $options;

    public string $optionValue;

    public string $optionText;

    public function __construct(array $options, string $optionValue, string $optionText)
    {
        $this->optionValue = $optionValue;
        $this->optionText = $optionText;
        $this->options = $options;
    }


    public function render()
    {
        return view('kit::radio');
    }
}
