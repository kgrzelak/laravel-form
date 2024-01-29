<?php

namespace Kgrzelak\LaravelForm\Items;

class FormSelect extends BaseItem
{
    public function __construct()
    {
        $this->class = config('laravel-form.select.class', 'form-select');
        $this->viewName = 'select';
    }

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