<?php

namespace App\Modules\Leads\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'name',
        'product_group_id',
        'product_id',
        'budget',
        'priority',
        'start_date',
        'assignee',
        'contact',
        'position',
        'source_id',
        'employees',
        'branches',
        'business',
        'automation',
        'status_id',
        'default_language',
        'mobile',
        'whatsapp',
        'phone',
        'fax',
        'email',
        'website',
        'country_id',
        'state_id',
        'city_id',
        'area_id',
        'facebook',
        'instagram',
        'linkedin',
        'location',
        'description',
        'inserted_by'
    ];
    public static $rules = [
        'name' => 'required',
        'product_group_id' => 'required',
        'product_id' => 'required',
        'contact' => 'required',
        'mobile' => 'required',
        'status_id' => 'required',
        'source_id' => 'required',
        'business' => 'required',
        'website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'email' => 'nullable|email',
        'inserted_by'=> 'required'
    ];

    /**
     * @var string[]
     */
    public static $editRules = [
        'status_id' => 'required',
        'source_id' => 'required',
        'business' => 'required',
        'website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'email' => 'nullable|email',
    ];
//    public function leadStatus(): BelongsTo
//    {
//        return $this->belongsTo(LeadStatus::class, 'status_id');
//    }

//    public function leadSource(): BelongsTo
//    {
//        return $this->belongsTo(LeadSource::class, 'source_id');
//    }
//
//    /**
//     * @return BelongsTo
//     */
//    public function assignedTo(): BelongsTo
//    {
//        return $this->belongsTo(User::class, 'assignee');
//    }
//    /**
//     * @return BelongsTo
//     */
//    public function leadCountry(): BelongsTo
//    {
//        return $this->belongsTo(Country::class, 'country_id');
//    }
//    /**
//     * @return BelongsTo
//     */
//    public function state(): BelongsTo
//    {
//        return $this->belongsTo(State::class, 'state_id');
//    }
//    /**
//     * @return BelongsTo
//     */
//    public function city(): BelongsTo
//    {
//        return $this->belongsTo(City::class, 'city_id');
//    }
//    /**
//     * @return BelongsTo
//     */
//    public function area(): BelongsTo
//    {
//        return $this->belongsTo(Area::class, 'area_id');
//    }
//
//    public function productGroup(){
//        return $this->belongsTo(ItemGroup::class,'product_group_id');
//    }
//    public function product()
//    {
//        return $this->belongsTo(Item::class, 'product_id');
//    }
}
