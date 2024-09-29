<?php

namespace App\Http\Requests;

use App\Models\Astreinte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAstreinteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('astreinte_edit');
    }

    public function rules()
    {
        return [
            'emplois.*' => [
                'integer',
            ],
            'emplois' => [
                'required',
                'array',
            ],
            'montant' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'zones.*' => [
                'integer',
            ],
            'zones' => [
                'required',
                'array',
            ],
        ];
    }
}
