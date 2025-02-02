<?php

namespace App\Modules\Leads\Requests;

use App\Modules\Leads\Models\LeadSource;
use Illuminate\Foundation\Http\FormRequest;

class LeadSourceRequest extends FormRequest
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
        $leadSourceId = $this->route('leadSource') ? $this->route('leadSource')->id : null; // create -> null, update -> id
        return LeadSource::rules($leadSourceId);
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The source name is required.',
            'name.unique' => 'The source name has already been taken.',
        ];
    }
}
