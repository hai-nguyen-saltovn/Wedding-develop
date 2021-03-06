<?php

namespace App\Http\Requests\Staff;

use App\Utils\TableName;
use Illuminate\Foundation\Http\FormRequest;

class StoreStaff extends FormRequest
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
        return [
            'vendor_id' => ['required','integer', 'exists:vendors,vendor_id'],
            'staff_name' => 'required|string|min:6|max:255',
            'phone' => 'nullable|string|max:14',
            'address' => 'nullable|string|max:255',
             'role_id' => 'required|exists:roles',
            'email' => 'required|string|min:6|max:255|email|unique:' . TableName::TBL_STAFFS,
            'password' =>  'required|string|min:6|max:255',
        ];
    }
}
