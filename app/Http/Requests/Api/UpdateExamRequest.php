<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|integer |exists:students,id',
            'subject_id' => 'required|integer |exists:subjects,id',
            'type' => 'required|in:oral,15_minutes,1_hour,final',
            'score' => 'required|numeric',
            'year' => 'required|integer',
            'coefficient' => 'required|integer',
        ];
    }
}
