<?php

namespace App\Http\Requests;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class ImportForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];

        $rules = [
            $rules,
            RequestRuleConstant::importColumns(),
        ];


        return Arr::collapse($rules);
    }
}
