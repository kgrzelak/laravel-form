# Html form helper for Laravel

## Installation
```bash
composer require kgrzelak/laravel-form
```

### Publish files
```bash
php artisan vendor:publish --provider="Kgrzelak\LaravelForm\LaravelFormServiceProvider"
```

## Usage example

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
