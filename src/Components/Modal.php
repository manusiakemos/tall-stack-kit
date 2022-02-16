<?php

namespace TallStackKit\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id, $maxWidth;

    public function __construct($id, $maxWidth="2xl")
    {
        $this->id = $id;
        $this->$maxWidth = $maxWidth;
    }

    public function render()
    {
        return view('kit::modal');
    }
}
