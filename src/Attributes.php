<?php

namespace Kgrzelak\LaravelForm;

class Attributes
{
    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @var array
     */
    private array $classes = [];

    /**
     * @description Set attribute
     * @param string $name
     * @param string|null $value
     * @return static
     */
    public function setAttribute(string $name, mixed $value = null): self
    {
        if ($value === null || $value === false) {
            unset($this->attributes[$name]);
            return $this;
        }

        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * @description Get all attributes
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @description Get attribute by name
     * @param string $name
     * @return string|null
     */
    public function getAttribute(string $name): ?string
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * @description Add class to the attributes
     * @param string $class
     * @return Attributes
     */
    public function addClass(string $class): static
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * @description Set class to the attributes
     * @param string $class
     * @return static
     */
    public function setClass(string $class): static
    {
        $this->classes = [$class];

        return $this;
    }

    /**
     * @description Get all classes
     * @return array
     */
    public function getClass(): array
    {
        return $this->classes;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $html = [];

        if ($this->classes) {
            $this->attributes['class'] = implode(' ', $this->classes);
        }

        foreach ($this->attributes as $name => $value) {
            $html[$name] = sprintf('%s="%s"', $name, e($value));
        }

        return implode(' ', $html);
    }
}
