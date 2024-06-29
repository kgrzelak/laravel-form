<?php

namespace Kgrzelak\LaravelForm\Renders;

use Kgrzelak\LaravelForm\Attributes;

class TextareaRender implements Render
{
    public function render(Attributes $attributes): string
    {
        $value = $attributes->getAttribute('value');
        $attributes->setAttribute('value', null);

        return '<textarea ' . $attributes . '>' .  $value . '</textarea>';
    }
}
