<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\In;

class IncomingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'json.jsonrpc' => 'required',
            'json.controller' => 'required|string',
            'json.method' => 'required|string',
            'json.params' => 'sometimes|array'
        ];
    }
}
