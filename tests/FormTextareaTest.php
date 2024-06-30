<?php

namespace Kgrzelak\LaravelForm\Tests;

use Kgrzelak\LaravelForm\LaravelForm;

final class FormTextareaTest extends TestCase
{
    public function testCanCreateTextarea(): void
    {
        $item = LaravelForm::textarea();

        $this->assertEquals('<textarea class="form-control"></textarea>', $item);
    }

    public function testCanCreateTextareaWithName(): void
    {
        $item = LaravelForm::textarea()->name('test');

        $this->assertEquals('<textarea name="test" class="form-control"></textarea>', $item);
    }

    public function testCanCreateTextareaWithId(): void
    {
        $item = LaravelForm::textarea()->id('test');

        $this->assertEquals('<textarea id="test" class="form-control"></textarea>', $item);
    }

    public function testCanCreateTextareaWithNameAndId(): void
    {
        $item = LaravelForm::textarea()->name('test')->id('test');

        $this->assertEquals('<textarea name="test" id="test" class="form-control"></textarea>', $item);
    }

    public function testCanCreateTextareaWithCustomAttribute(): void
    {
        $item = LaravelForm::textarea()->name('test')->attribute('data-test', 'test');

        $this->assertEquals('<textarea name="test" data-test="test" class="form-control"></textarea>', $item);
    }

    public function testCanCreateTextareaWithErrors(): void
    {
        $this->setErrors();

        $item = LaravelForm::textarea()->name('test');

        $this->assertEquals(
            expected: '<textarea name="test" class="form-control is-invalid"></textarea><span class="invalid-feedback" role="alert"><strong>error</strong></span>',
            actual: $item
        );
    }

    public function testCanCreateTextareaWithValue(): void
    {
        $item = LaravelForm::textarea()->value('test');

        $this->assertEquals('<textarea class="form-control">test</textarea>', $item);
    }
}
