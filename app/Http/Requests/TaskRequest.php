<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SebastianBergmann\Environment\Console;

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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!empty($this->due_date)) {
            $this->merge([
                'due_date' => date("Y-m-d", strtotime($this->due_date))
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!empty($this->id)) {
            $id = $this->id;
        }
        $rulesCollection = [
            'project_id' => 'required',
            'issue_type' => 'required',
            'reporter' => 'required',
            'summary' => 'required|unique:tasks,summary'
        ];
        if (strcmp($this->method(), "PUT") == 0 && !empty($this->id)) {
            $rulesCollection['summary'] .= "," . $this->id;
        }
        return $rulesCollection;
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
