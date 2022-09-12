<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IssueRequest extends FormRequest
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
        $isPostRequest = $this->getMethod() === 'POST';

        $rules = [
            'title' => $isPostRequest
                ? 'required|min:5|max:255|unique:issues,title'
                : [
                    'required',
                    'min:5',
                    'max:255',
                    Rule::unique('issues')->ignoreModel($this->route()->parameters['issue']),
                ],
            'description' => 'required|min:10',
        ];

        if (! $isPostRequest) {
            $rules['status_id'] = 'required|exists:statuses,id';
        }


        return $rules;
    }
}
