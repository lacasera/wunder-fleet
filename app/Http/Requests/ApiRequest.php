<?php

namespace App\Http\Requests;

class ApiRequest extends JsonRequest
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
            "first_name" => "bail|required|string",
            "last_name" => "bail|required|string",
            "zip_code" => "bail|required|string",
            "street" => "bail|required|string",
            "city" => "bail|required|string",
            "iban" => "bail|required|string",
            "house_number" => "bail|required|string",
            "phone_number" => "bail|required|phone:AUTO"
        ];
    }
}
