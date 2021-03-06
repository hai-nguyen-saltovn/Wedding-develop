<?php

namespace App\Http\Requests\Menu;

use App\Enums\ServiceCodeEnum;
use App\Http\Requests\RequestAbstract;

class ShowRequest extends RequestAbstract
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
     * @return array
     */
    public function rules()
    {
        $res = ServiceCodeEnum::REST;
        $qc = ServiceCodeEnum::QUAC;
        return [
            'vendor_id' => ['required','integer', 'exists:vendors,vendor_id'],
            'menu_type' => ['required','string', 'in:food,drink'],
            'service_code' => ['required','string', "in:$res,$qc"],
        ];
    }
}
