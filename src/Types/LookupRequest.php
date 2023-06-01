<?php

namespace System\Types;

class LookupRequest extends FormRequest
{
    /**
     * Retrieve the validation rules that apply to the request.
     *
     */
    public function rules() : array
    {
        return [
            'match' => 'bail|required|boolean',
            'term'  => 'bail|required|string|min:1|max:50',
            'page'  => 'bail|nullable|integer|min:1',
        ];
    }
}
