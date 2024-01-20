<?php

namespace Kgrzelak\LaravelForm\Items;

use Illuminate\Contracts\Support\Htmlable;
use Stringable;

abstract class BaseItem implements Htmlable, Stringable
{
    protected ?string $id = null;

    protected ?string $name = null;

    protected string $type = 'text';

    protected ?string $value = null;

    protected ?string $placeholder = null;

    protected array $attributes = [];

    protected bool $required = false;

    protected string $class = 'form-control';

    protected string $viewName = 'input';

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function setPlaceholder(string $placeholder): static
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function setRequired(bool $required): static
    {
        $this->required = $required;

        return $this;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function toHtml(): string
    {
        return view('laravel-form::' . $this->viewName, [
            'id' => $this->id,
            'name' => $this->name,
            'class' => $this->class,
            'type' => $this->type,
            'value' => $this->value,
            'attributes' => $this->attributes($this->attributes),
            'required' => $this->required
        ])->render();
    }

    private function attributes(array $attributes): string
    {
        $items = '';

        foreach ($attributes as $key => $value) {
            $items .= $key.'="'.$value.'"';
        }

        return $items;
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}