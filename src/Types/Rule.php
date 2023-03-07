<?php

namespace Caneara\Spine\Types;

use Closure;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Contracts\Validation\ValidationRule;

abstract class Rule implements ValidationRule
{
    use Conditionable;

    /**
     * The error message to use.
     *
     */
    protected string $message = 'The :attribute is invalid';

    /**
     * The parameters supplied to the rule.
     *
     */
    protected array $parameters;

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $this->parameters = func_get_args();
    }

    /**
     * Handle a validation failure.
     *
     */
    public function fail(string $message = '') : bool
    {
        $this->message = $message ? $message : $this->message;

        return false;
    }

    /**
     * Factory method.
     *
     */
    public static function make() : static
    {
        return new static(...func_get_args());
    }

    /**
     * Run the validation rule.
     *
     */
    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        $this->unless($this->passes($value), fn() => $fail($this->message));
    }
}
