<?php

namespace Kgrzelak\LaravelForm\Renders;

use Kgrzelak\LaravelForm\Attributes;

class SelectRender implements Render
{
    public function __construct(protected array $options = [])
    {
        //
    }

    public function render(Attributes $attributes): string
    {
        $options = '<select ' . $attributes . '>';

        foreach ($this->options as $option) {
            $options .= '<option value="' . $option['value'] . '">' . $option['label'] . '</option>';
        }

        $options .= '</select>';

        return $options;
    }
}
