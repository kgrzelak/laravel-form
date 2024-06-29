<?php

namespace Kgrzelak\LaravelForm\Renders;

use Kgrzelak\LaravelForm\Attributes;

class InputRender implements Render
{
    public function render(Attributes $attributes): string
    {
        return '<input ' . $attributes . '>';
    }
}
