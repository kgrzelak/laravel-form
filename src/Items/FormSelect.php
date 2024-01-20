<?php

namespace Kgrzelak\LaravelForm\Items;

class FormSelect extends BaseItem
{
    public function __construct()
    {
        $this->class = config('laravel-form.select.class', 'form-select');
        $this->viewName = 'select';
    }
}