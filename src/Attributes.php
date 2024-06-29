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
     * @param string $name
     * @param string|null $value
     * @return Attributes
     */
    public function setAttribute(string $name, ?string $value = null): self
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param string $class
     * @return Attributes
     */
    public function addClass(string $class): static
    {
        $this->classes[] = $class;

        return $this;
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
            $html[$name] = sprintf('%s="%s"', $name, $value);
        }

        return implode(' ', $html);
    }
}
