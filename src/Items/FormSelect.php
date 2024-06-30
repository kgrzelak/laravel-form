<?php

namespace Kgrzelak\LaravelForm\Items;

use Kgrzelak\LaravelForm\BaseItem;

class FormSelect extends BaseItem
{
    public string $viewName = 'select';

    protected array $options = [];

    public function setOptions(array $options): static
    {
        if (count($options) === count($options, COUNT_RECURSIVE)) {
            foreach ($options as $value => $label) {
                $this->options[] = ['value' => $value, 'label' => $label];
            }
        } else {
            $this->options = $options;
        }

        return $this;
    }

    public function addOption(string $value, string $label): static
    {
        $this->options[] = ['value' => $value, 'label' => $label];

        return $this;
    }
}
