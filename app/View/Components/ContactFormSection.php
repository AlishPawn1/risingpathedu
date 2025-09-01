<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactFormSection extends Component
{
    public $formType;
    public function __construct($formType = 'simple')
    {
        $this->formType = $formType;
    }

    public function render(): View|Closure|string
    {
        return view('components.contact-form-section');
    }
}
