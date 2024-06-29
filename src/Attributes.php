<?php

namespace Kgrzelak\LaravelForm;

class Attributes
{
    /**
     * @var array
     */
    private array $attributes = [];

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

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $html = '';

        foreach ($this->attributes as $name => $value) {
            $html .= sprintf('%s="%s" ', $name, $value);
        }

        return $html;
    }
}
