<?php

namespace App\Modules\Leads\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadStatus extends Model
{
    use HasFactory;

    protected $table = 'lead_statuses';

    protected $fillable = [
        'name',
        'color',
        'order',
    ];
    public static function rules($leadStatusId = null)
    {
        return [
            'name' => 'required|unique:lead_statuses,name,' . $leadStatusId . ',id',
            'order' => 'required',
        ];
    }
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'status_id');
    }
}
