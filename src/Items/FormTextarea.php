<?php

namespace Kgrzelak\LaravelForm\Items;

class FormTextarea extends BaseItem
{
    public function __construct ()
    {
        $this->class = config('laravel-form.textarea.class', 'form-control');
        $this->viewName = 'textarea';
    }
}