<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployerJobRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'min_salary' => 'integer',
            'max_salary' => [
                'integer',
                'gte:min_salary',
                Rule::requiredIf($this->min_salary)
            ],
            'industry_id' => 'required|int|exists:App\Models\Industry,id',
            'duration' => [Rule::in(array_column(Job::DURATIONS, 'value'))],
            'status' => [Rule::in(array_column(Job::STATUS, 'value'))],
            'opening' => 'int|min:1',
            'start_date' => 'date|after:today',
            'type' => ['required', Rule::in(array_column(Job::TYPES, 'id'))]
        ];
    }
}
