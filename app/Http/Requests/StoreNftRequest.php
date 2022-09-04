<?php

namespace App\Http\Requests;

use App\Models\Nft;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNftRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('nft_create'),
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
            'collection_id' => [
                'integer',
                'exists:collections,id',
                'required',
            ],
            'metadata_id' => [
                'integer',
                'exists:metadatas,id',
                'nullable',
            ],
            'total_to_mint' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
