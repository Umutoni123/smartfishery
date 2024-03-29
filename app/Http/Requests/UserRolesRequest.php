<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRolesRequest extends FormRequest
{
    //     /**
    //      * Determine if the user is authorized to make this request.
    //      *
    //      * @return bool
    //      */
    //     public function authorize()
    //     {
    //         return false;
    //     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'location_id' => 'required|integer|exists:locations,id',
            'cooperative_id' => 'required|integer|exists:cooperatives,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
