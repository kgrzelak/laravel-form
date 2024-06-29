<?php

namespace Kgrzelak\LaravelForm\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Kgrzelak\LaravelForm\LaravelFormServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithSession;

    public function getPackageProviders($app): array
    {
        return [
            LaravelFormServiceProvider::class
        ];
    }

    public function setErrors(): void
    {
        $this->startSession();
        $this->withSession(['errors' => (new ViewErrorBag)->put('default', new MessageBag(['test' => 'error']))]);
    }
}
