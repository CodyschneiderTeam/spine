<?php

namespace Caneara\Spine\Types;

use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Util;
use Illuminate\Foundation\Http\FormRequest as Request;

class FormRequest extends Request
{
    /**
     * Ensure that the request returns all supplied data.
     *
     */
    public function all($keys = null) : array
    {
        $parameters = $this->route()?->parameters() ?? [];

        $parameters = Arr::replaceRecursive($parameters, $this->query());

        return Arr::replaceRecursive(parent::all($keys), $parameters);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Retrieve the validation rules that apply to the request.
     *
     */
    public function rules() : array
    {
        return [];
    }

    /**
     * Handle a passed validation attempt.
     *
     */
    protected function passedValidation() : void
    {
        if (method_exists($this, 'transform')) {
            if (Util::filled($this->rules())) {
                $this->transform();
            }
        }
    }
}
