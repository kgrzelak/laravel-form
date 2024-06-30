<?php

namespace Kgrzelak\LaravelForm\Items;

use Kgrzelak\LaravelForm\BaseItem;

class FormInput extends BaseItem
{
    public string $viewName = 'input';

    public ?string $type = 'text';

    public function render(): string
    {
        return '<input' . $this->attributes . '>';
    }
}
