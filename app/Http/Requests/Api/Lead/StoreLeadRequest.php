<?php

namespace App\Http\Requests\Api\Lead;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],

            'phone' => ['required', 'string', 'max:20'],

            'state' => ['nullable', 'string', 'max:100'],

            'university_id' => [
                'nullable',
                'exists:universities,id'
            ],

            'course_id' => [
                'nullable',
                'exists:courses,id'
            ],

            'specialization_id' => [
                'nullable',
                'exists:specializations,id'
            ],

            'source' => [
                'nullable',
                'string',
                'max:255'
            ],

            'page_url' => [
                'nullable',
                'url',
                'max:1000'
            ],

            'remarks' => [
                'nullable',
                'string'
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Name is required.',

            'phone.required' => 'Phone number is required.',

            'email.email' => 'Please enter a valid email address.',

            'university_id.exists' => 'Selected university does not exist.',

            'course_id.exists' => 'Selected course does not exist.',

            'specialization_id.exists' => 'Selected specialization does not exist.',

            'page_url.url' => 'Please provide a valid page URL.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(

            response()->json([

                'success' => false,

                'message' => 'Validation failed.',

                'errors' => $validator->errors()

            ], 422)

        );
    }
}
