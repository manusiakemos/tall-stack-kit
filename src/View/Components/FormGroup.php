<?php

namespace Manusiakemos\TallStackKit\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $inputId;
    public $errorName;
    public $textLabel;

    public function __construct($inputId, $errorName, $textLabel)
    {
        $this->inputId = $inputId;
        $this->errorName = $errorName;
        $this->textLabel = $textLabel;
    }

    public function render()
    {
        return view('kit::form-group');
    }
}
