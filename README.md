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
    ->setName('input-name')
    ->setType('text')
    ->setValue('input-value')
    ->setPlaceholder('input-placeholder')
    ->setClass('form-control')
    ->setAttributes(['readonly' => 'readonly']);
```