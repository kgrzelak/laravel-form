<?php

namespace Kgrzelak\LaravelForm;

use Kgrzelak\LaravelForm\Items\FormInput;
use Kgrzelak\LaravelForm\Items\FormSelect;

class LaravelForm
{
    public static function input(): FormInput
    {
        return new FormInput();
    }

    public static function select(): FormSelect
    {
        return new FormSelect();
    }
}