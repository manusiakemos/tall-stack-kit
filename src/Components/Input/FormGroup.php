<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public string $key;
    public string $label;
    public string $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $label, $model)
    {
        $this->key = $key;
        $this->label = $label;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.form-group');
    }
}
