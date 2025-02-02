<?php

namespace App\Modules\Leads\Requests;

use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Models\LeadStatus;
use Illuminate\Foundation\Http\FormRequest;

class LeadStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add any authorization logic here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // You can add any validation rules here
        $leadStatusId = $this->route('leadStatus') ? $this->route('leadStatus')->id : null; // create -> null, update -> id
        return LeadStatus::rules($leadStatusId);
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The status name is required.',
            'name.unique' => 'The status name has already been taken.',
        ];
    }
}
