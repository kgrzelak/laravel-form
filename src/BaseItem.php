<?php

namespace Kgrzelak\LaravelForm;

use BackedEnum;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Kgrzelak\LaravelForm\Renders\InputRender;
use Kgrzelak\LaravelForm\Renders\SelectRender;
use Kgrzelak\LaravelForm\Renders\TextareaRender;
use Stringable;

abstract class BaseItem implements Htmlable, Stringable
{
    protected ?string $type = 'text';

    protected Attributes $attributes;

    protected string $viewName = 'input';

    protected array $options = [];

    public function __construct()
    {
        $this->attributes = new Attributes();

        $this->attributes->addClass(config('laravel-form.' . $this->viewName . '.class', 'form-control'));
        $this->attributes->setAttribute('type', $this->type);
    }

    /**
     * @description Set the id attribute of the input
     * @param string|int $id
     * @return static
     */
    public function id(string|int $id): static
    {
        $this->attributes->setAttribute('id', $id);

        return $this;
    }

    /**
     * @deprecated Use id() instead
     * @param string $id
     * @return static
     */
    public function setId(string $id): static
    {
        $this->attributes->setAttribute('id', $id);

        return $this;
    }

    /**
     * @description Set the name attribute of the input
     * @param string $name - Name of the input
     * @return static
     */
    public function name(string $name): static
    {
        $this->attributes->setAttribute('name', $name);

        return $this;
    }

    /**
     * @deprecated Use name() instead
     * @param string $name - Name of the input
     * @return $this
     */
    public function setName(string $name): static
    {
        $this->attributes->setAttribute('name', $name);

        return $this;
    }

    public function type(string $type): static
    {
        $this->attributes->setAttribute('type', $type);

        return $this;
    }

    /**
     * @description Set the value of the input
     * @param mixed|null $value - Value of the input
     * @return static
     */
    public function value(mixed $value = null): static
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        if (app('request')->old($this->attributes->getAttribute('name'))) {
            $value = app('request')->old($this->attributes->getAttribute('name'));
        }

        $this->attributes->setAttribute('value', $value);

        return $this;
    }

    /**
     * @deprecated Use value() instead
     * @param mixed|null $value
     * @return $this
     */
    public function setValue(mixed $value = null): static
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        if (app('request')->old($this->attributes->getAttribute('name'))) {
            $value = app('request')->old($this->attributes->getAttribute('name'));
        }

        $this->attributes->setAttribute('value', $value);

        return $this;
    }

    /**
     * @description Set the placeholder of the input
     * @param string $placeholder
     * @return static
     */
    public function placeholder(string $placeholder): static
    {
        $this->attributes->setAttribute('placeholder', $placeholder);

        return $this;
    }

    /**
     * @description Set the required attribute of the input
     * @param bool $required
     * @return static
     */
    public function required(bool $required): static
    {
        $this->attributes->setAttribute('required', $required);

        return $this;
    }

    /**
     * @description Set the class of the input
     * @param string $class - Name of the class
     * @return static
     */
    public function setClass(string $class): static
    {
        $this->attributes->setClass($class);

        return $this;
    }

    /**
     * @description Add a class to the input
     * @param string $class - Name of the class
     * @return static
     */
    public function addClass(string $class): static
    {
        $this->attributes->addClass($class);

        return $this;
    }

    /**
     * @description Set the attribute of the input
     * @param string|int $name - Name of the attribute
     * @param string|null $value - Value of the attribute
     * @return static
     */
    public function attribute(string|int $name, ?string $value = null): static
    {
        $this->attributes->setAttribute($name, $value);

        return $this;
    }

    public function toHtml(): string
    {
        if ($this->hasError() && config('laravel-form.errors.enabled', false)) {
            $this->attributes->addClass('is-invalid');
        }

        return new HtmlString(
            match ($this->viewName) {
                'input' => (new InputRender())->render($this->attributes),
                'textarea' => (new TextareaRender())->render($this->attributes),
                'select' => (new SelectRender($this->options))->render($this->attributes),
            } . $this->getErrors()
        );
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }

    private function getError(): ?string
    {
        if (!$this->hasError()) {
            return null;
        }

        $errors = app('session')->get('errors', app(ViewErrorBag::class));

        return $errors->getBag('default')->first($this->attributes->getAttribute('name'));
    }

    private function hasError()
    {
        if (!$name = $this->attributes->getAttribute('name')) {
            return null;
        }

        $errors = app('session')->get('errors', app(ViewErrorBag::class));
        if (!$errors->getBag('default')->has($name)) {
            return null;
        }

        return $errors->getBag('default')->has($name);
    }

    private function getErrors(): string
    {
        $errors = '';
        if (config('laravel-form.errors.enabled', false)) {
            if ($error = $this->getError()) {
                $errors =
                    Str::replace(
                        search: ':message:',
                        replace: $error,
                        subject: config('laravel-form.errors.html', '<span class="invalid-feedback" role="alert"><strong>:message:</strong></span>')
                    );
            }
        }

        return $errors;
    }
}
