<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class SelectSearch extends Component
{

    #add all parameters construct to public property
    public string $placeholder;
    public string $optionValue;
    public string $optionText;
    public array $options;

    public function __construct($placeholder = "Choose one", $options = [], $optionValue = "", $optionText = "")
    {
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->optionValue = $optionValue;
        $this->optionText = $optionText;
    }

    public function render()
    {
        return view('kit::select-search');
    }
}
