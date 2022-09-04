<?php

namespace App\Http\Requests;

use App\Models\Pass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('pass_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'token' => [
                'string',
                'min:8',
                'required',
            ],
            'supply' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
