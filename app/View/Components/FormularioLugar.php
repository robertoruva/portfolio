<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormularioLugar extends Component
{
	public $action;
	public $method;
	public $lugar;
	public $buttonText;
    /**
     * Create a new component instance.
     */
    public function __construct($action, $method = 'POST', $lugar = null, $buttonText = 'Guardar')
    {
        $this->action = $action;
		$this->method = strtoupper($method);
		$this->lugar = $lugar;
		$this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.formulario-lugar');
    }
}
