<?php

namespace Kgrzelak\LaravelForm\Tests;

use Kgrzelak\LaravelForm\Attributes;

final class AttributesTest extends TestCase
{
    public function testCanSetClassAttribute(): void
    {
        $attributes = new Attributes();
        $attributes->setClass('test-class');

        $this->assertEquals(['test-class'], $attributes->getClass());
    }

    public function testCanAddClassAttribute(): void
    {
        $attributes = new Attributes();
        $attributes->setClass('test-class');
        $attributes->addClass('another-class');

        $this->assertEquals(['test-class', 'another-class'], $attributes->getClass());
    }

    public function testCanAddAttribute(): void
    {
        $attributes = new Attributes();
        $attributes->setAttribute('data-test', 'test');

        $this->assertEquals(['data-test' => 'test'], $attributes->getAttributes());
    }

    public function testCanGetAttribute(): void
    {
        $attributes = new Attributes();
        $attributes->setAttribute('data-test', 'test');

        $this->assertEquals('test', $attributes->getAttribute('data-test'));
    }

    public function testCanRemoveAttribute(): void
    {
        $attributes = new Attributes();
        $attributes->setAttribute('data-test', 'test');
        $attributes->setAttribute('data-test');

        $this->assertEquals([], $attributes->getAttributes());
    }
}
