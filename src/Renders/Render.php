<?php

namespace Kgrzelak\LaravelForm\Renders;

use Kgrzelak\LaravelForm\Attributes;

interface Render
{
    public function render(Attributes $attributes): string;
}
