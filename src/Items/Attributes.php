<?php

namespace Kgrzelak\LaravelForm\Items;

use Illuminate\Contracts\Support\Htmlable;
use Stringable;

readonly class Attributes implements Htmlable, Stringable
{
    public function __construct(private array $attributes)
    {
        //
    }

    public function toHtml(): string
    {
        return view('laravel-form::_attributes', [
            'attributes' => $this->attributes
        ])->render();
    }

    public function __toString()
    {
        return $this->toHtml();
    }
}