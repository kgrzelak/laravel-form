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
            $selected = $option['value'] == $attributes->getAttribute('value') ? ' selected' : '';

            $options .= '<option value="' . $option['value'] . '"' . $selected . '>' . $option['label'] . '</option>';
        }

        $options .= '</select>';

        return $options;
    }
}
