<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true to allow access
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The task name is required.',
            'due_date.required' => 'Please provide a valid due date.',
            'priority.in' => 'Priority must be one of: low, medium, or high.',
            'status.in' => 'Status must be one of: to-do, in progress, or done.',
        ];
    }

}
