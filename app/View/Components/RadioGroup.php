<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    public $name;
    public $options;
    public ?bool $allOption = true;
    public ?string $value = null;
    /**
     * Create a new component instance.
     */
    public function __construct($name, array $options,$allOption=true)

     
    
    {
        $this->name = $name;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}