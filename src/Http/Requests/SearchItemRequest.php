<?php

namespace Korzechowski\RestApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "columnName" => [
               "required",
                Rule::in(["amount", "name"])
            ],
            "operator" => [
                "required",
                Rule::in([">", "<", ">=", "<="])
            ],
            "value" => "required"
        ];
    }
}
