<?php

namespace Kgrzelak\LaravelForm\Tests;

use Kgrzelak\LaravelForm\LaravelForm;

final class FormInputTest extends TestCase
{
    public function testCanCreateInput(): void
    {
        $item = LaravelForm::input();

        $this->assertEquals('<input type="text" class="form-control">', $item);
    }

    public function testCanCreateInputWithName(): void
    {
        $item = LaravelForm::input()->name('test');

        $this->assertEquals('<input type="text" name="test" class="form-control">', $item);
    }

    public function testCanCreateInputWithId(): void
    {
        $item = LaravelForm::input()->id('test');

        $this->assertEquals('<input type="text" id="test" class="form-control">', $item);
    }

    public function testCanCreateInputWithErrors(): void
    {
        $this->setErrors();

        $item = LaravelForm::input()->name('test');

        $this->assertEquals(
            expected: '<input type="text" name="test" class="form-control is-invalid"><span class="invalid-feedback" role="alert"><strong>error</strong></span>',
            actual: $item
        );
    }

    public function testCanCreateInputWithNameAndId(): void
    {
        $item = LaravelForm::input()->name('test')->id('test');

        $this->assertEquals('<input type="text" name="test" id="test" class="form-control">', $item);
    }

    public function testCanCreateInputWithCustomAttribute(): void
    {
        $item = LaravelForm::input()->name('test')->attribute('data-test', 'test');

        $this->assertEquals('<input type="text" name="test" data-test="test" class="form-control">', $item);
    }

    public function testCanReplaceClassAttribute(): void
    {
        $item = LaravelForm::input()->name('test')->setClass('test');

        $this->assertEquals('<input type="text" name="test" class="test">', $item);
    }

    public function testErrorWorksWithCustomClassName(): void
    {
        $this->setErrors();

        $item = LaravelForm::input()->name('test')->setClass('test');

        $this->assertEquals(
            expected: '<input type="text" name="test" class="test is-invalid"><span class="invalid-feedback" role="alert"><strong>error</strong></span>',
            actual: $item
        );
    }

    public function testDontShowErrorsWhenDisabledInConfiguration(): void
    {
        $this->app['config']->set('laravel-form.errors.enabled', false);

        $this->setErrors();

        $item = LaravelForm::input()->name('test');

        $this->assertEquals('<input type="text" name="test" class="form-control">', $item);
    }

    public function testCanCreateInputWithCustomType(): void
    {
        $item = LaravelForm::input()->type('password');

        $this->assertEquals('<input type="password" class="form-control">', $item);
    }

    public function testCanCreateInputWithoutType(): void
    {
        $item = LaravelForm::input()->type(null);

        $this->assertEquals('<input class="form-control">', $item);
    }

    public function testCanCreateInputWithAttributes(): void
    {
        $item = LaravelForm::input()->setAttributes(['type' => 'password', 'name' => 'password']);

        $this->assertEquals('<input type="password" name="password" class="form-control">', $item);
    }

    public function testCanCreateInputWithRequired(): void
    {
        $item = LaravelForm::input()->required();

        $this->assertEquals('<input type="text" required="required" class="form-control">', $item);
    }

    public function testCanCreateInputWithoutRequired(): void
    {
        $item = LaravelForm::input()->required()->required(false);

        $this->assertEquals('<input type="text" class="form-control">', $item);
    }
}
