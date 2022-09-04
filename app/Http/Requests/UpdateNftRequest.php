<?php

namespace App\Http\Requests;

use App\Models\Nft;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNftRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('nft_edit'),
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
        ];
    }
}
