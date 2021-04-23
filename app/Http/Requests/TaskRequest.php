<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        if(!empty($this->id)){
            $id = $this->id;
        }
        switch ($this->method()) {
            case 'POST':
                return [
                    'project_id' => 'required',
                    'issue_type' => 'required',
                    'reporter' => 'required',
                    'summary' => 'required|unique:tasks,summary'
                ];
                break;

            case 'PUT':
                return [
                    'project_id' => 'required',
                    'issue_type' => 'required',
                    'reporter' => 'required',
                    'summary' => 'required|unique:tasks,summary,' .  $id
                ];
                break;

            default:
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'project_id.required' => 'A project is required',
            'issue_type.required' => 'A issue type is required',
            'reporter.required' => 'A reporter is required',
            'summary.required' => 'A summary is required',
            'summary.unique' => 'A summary unique'
        ];
    }
}
