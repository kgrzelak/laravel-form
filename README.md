# HTML form helper for Laravel

## Features
- Simple form elements creation with laravel errors from validation
- Fully customizable form elements with fluent interface

## Installation
```bash
composer require kgrzelak/laravel-form
```
After installation, you can publish config file.
```bash
php artisan vendor:publish --provider="Kgrzelak\LaravelForm\LaravelFormServiceProvider"
```

## Usage examples in blade

### Form input
```php
Form::input()
    ->name('input-name')
    ->type('text')
    ->value('input-value')
    ->placeholder('input-placeholder')
    ->setClass('form-control')
    ->addClass('mt-5')
    ->attribute('readonly', 'readonly')
    ->attribute('required', 'required');
```

### Form textarea
```php
Form::textarea()
    ->name('textarea-name')
    ->value('textarea-value')
    ->placeholder('textarea-placeholder')
    ->setClass('form-control')
    ->addClass('mt-5')
    ->attribute('readonly', 'readonly')
    ->attribute('required', 'required');
```

### Form select
```php
Form::select()
    ->name('select-name')
    ->setOptions([
        'option-value-1' => 'option-label-1',
        'option-value-2' => 'option-label-2',
        'option-value-3' => 'option-label-3',
    ])
    ->addOption('option-value-4', 'option-label-4')
    ->value('option-value-2')
    ->setClass('form-control')
    ->addClass('mt-5')
    ->attribute('readonly', 'readonly')
    ->attribute('required', 'required');
```
