<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2 extends Component
{
    public $name;
    public $options;
    public $selected;

    public function __construct($name, $options, $selected = [])
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
    }

    public function render()
    {
        return view('components.select2');
    }
}
