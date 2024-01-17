<?php

namespace Kgrzelak\LaravelForm\Items;

use Illuminate\Contracts\Support\Htmlable;
use Stringable;

abstract class BaseItem implements Htmlable, Stringable
{
    protected string $name;

    protected string $id;

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }
}