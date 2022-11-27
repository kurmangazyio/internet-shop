<?php

declare(strict_types=1);

namespace App\Support\Core;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseFormRequest extends FormRequest
{
    abstract public function rules(): array;

    abstract public function authorize(): bool;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => $validator->errors()->first(),
            'data'      => []
        ]));
    }
}
