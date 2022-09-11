<?php

namespace App\Http\Requests;

use App\Models\Collection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCollectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('collection_create'),
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
            'symbol' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'supply' => [
                'string',
                'nullable',
            ],
            'royalty_fee' => [
                'numeric',
                'required',
            ],
            'image_url' => [
                'string',
                'nullable',
            ],
            'collection.release_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'pass_id' => [
                'integer',
                'exists:passes,id',
                'nullable',
            ],
        ];
    }
}
