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
        $value = $attributes->getAttribute('value');
        $attributes->setAttribute('value');

        $options = '<select ' . $attributes . '>';

        foreach ($this->options as $option) {
            $selected = $option['value'] == $value ? ' selected' : '';

            $options .= '<option value="' . $option['value'] . '"' . $selected . '>' . $option['label'] . '</option>';
        }

        $options .= '</select>';

        return $options;
    }
}
