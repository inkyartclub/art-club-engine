<?php

namespace App\Http\Requests;

use App\Models\Metadata;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMetadataRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('metadata_create'),
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
            'creator' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'cid' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
        ];
    }
}
