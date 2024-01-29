<?php

namespace Kgrzelak\LaravelForm;

use Kgrzelak\LaravelForm\Items\FormInput;
use Kgrzelak\LaravelForm\Items\FormSelect;
use Kgrzelak\LaravelForm\Items\FormTextarea;

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

    public static function textarea(): FormTextarea
    {
        return new FormTextarea();
    }
}