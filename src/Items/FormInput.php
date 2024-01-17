<?php

namespace Kgrzelak\LaravelForm\Items;

class FormInput extends BaseItem
{
    public function toHtml(): string
    {
        return view('laravel-form::input', [
            'id' => $this->id,
            'name' => $this->name,
        ])->render();
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}