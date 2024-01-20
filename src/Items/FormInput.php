<?php

namespace Kgrzelak\LaravelForm\Items;

class FormInput extends BaseItem
{
    public function __construct()
    {
        $this->class = config('laravel-form.input.class', 'form-input');
    }
}