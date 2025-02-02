<?php

namespace App\Modules\Leads\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    use HasFactory;

    protected $table = 'lead_sources';

    protected $fillable = [
        'name',
    ];
    public static function rules($leadSourceId = null)
    {
        return [
            'name' => 'required|unique:lead_sources,name,' . $leadSourceId . ',id',
        ];
    }
}
