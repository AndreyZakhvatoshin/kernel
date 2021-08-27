<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class APIFormRequest extends FormRequest
{
    /**
     * Формат вывода ошибок валидации для API
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    "status" => "error",
                    'errors' => [
                        "fields" => $validator->errors(),
                    ],
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                [],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            )
        );
    }
}
