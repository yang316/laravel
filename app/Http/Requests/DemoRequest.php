<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DemoRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID required',
            'name.required'  => 'name  required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->wantsJson() || $this->ajax()) {
            throw new JsonResponse([
                    'code' => 1,
                    'msg' => $validator->errors()->first(),
                    'data' => new \stdClass()
                ]);
        } else {
            parent::failedValidation($validator);
        }
    }


}
