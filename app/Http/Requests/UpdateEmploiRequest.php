<?php

namespace App\Http\Requests;

use App\Models\Emploi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmploiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('emploi_edit');
    }

    public function rules()
    {
        return [
            'intitule' => [
                'string',
                'required',
            ],
            'abrev' => [
                'string',
                'required',
            ],
        ];
    }
}
