<?php

namespace Kgrzelak\LaravelForm;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFormServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-form')
            ->hasConfigFile('laravel-form')
            ->hasViews('laravel-form');
    }
}
