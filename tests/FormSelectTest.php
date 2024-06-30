<?php

namespace Kgrzelak\LaravelForm\Tests;

use Kgrzelak\LaravelForm\LaravelForm;

final class FormSelectTest extends TestCase
{
    public function testCanRenderSelect(): void
    {
        $select = LaravelForm::select()->name('test');

        $this->assertEquals('<select name="test" class="form-select"></select>', $select);
    }

    public function testCanAddOptionToSelect(): void
    {
        $select = LaravelForm::select()->name('test')->addOption('test', 'Test');

        $this->assertEquals('<select name="test" class="form-select"><option value="test">Test</option></select>', $select);
    }

    public function testCanAddMultipleOptionsToSelect(): void
    {
        $select = LaravelForm::select()->name('test')->addOption('test', 'Test')->addOption('test2', 'Test 2');

        $this->assertEquals('<select name="test" class="form-select"><option value="test">Test</option><option value="test2">Test 2</option></select>', $select);
    }

    public function testSelectedOptionWorks(): void
    {
        $select = LaravelForm::select()->name('test')->addOption('test', 'Test')
            ->addOption('test2', 'Test 2')->value('test2')->toHtml();

        $this->assertEquals('<select name="test" class="form-select"><option value="test">Test</option><option value="test2" selected>Test 2</option></select>', $select);
    }

    public function testCanSetOptionsAsMultidimensionalArray(): void
    {
        $select = LaravelForm::select()->name('test')->setOptions([['value' => 'test', 'label' => 'Test'], ['value' => 'test2', 'label' => 'Test 2']]);

        $this->assertEquals('<select name="test" class="form-select"><option value="test">Test</option><option value="test2">Test 2</option></select>', $select);
    }

    public function testCanSetOptionsToSelect(): void
    {
        $select = LaravelForm::select()->name('test')->setOptions(['test' => 'Test', 'test2' => 'Test 2']);

        $this->assertEquals('<select name="test" class="form-select"><option value="test">Test</option><option value="test2">Test 2</option></select>', $select);
    }
}
