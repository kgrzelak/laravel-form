<?php

namespace Kgrzelak\LaravelForm\Items;

use Kgrzelak\LaravelForm\BaseItem;

class FormSelect extends BaseItem
{
    public string $viewName = 'select';

    public ?string $type = null;

    protected array $options = [];

    public function setOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function addOption(string $value, string $label): static
    {
        $this->options[] = ['value' => $value, 'label' => $label];

        return $this;
    }
}
