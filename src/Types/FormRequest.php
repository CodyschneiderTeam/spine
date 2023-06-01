<?php

namespace System\Types;

use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest as Request;

class FormRequest extends Request
{
    /**
     * Ensure that the request returns all supplied data.
     *
     */
    public function all($keys = null) : array
    {
        return Collection::make(parent::all($keys))
            ->replaceRecursive($this->route()?->parameters() ?? [])
            ->replaceRecursive($this->query())
            ->toArray();
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
}
