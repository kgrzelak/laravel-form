<?php

namespace Kgrzelak\LaravelForm\Items;

use Illuminate\Contracts\Support\Htmlable;
use Stringable;

abstract class BaseItem implements Htmlable, Stringable
{
    protected string $id;

    protected string $name;

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
        ])->render();
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}