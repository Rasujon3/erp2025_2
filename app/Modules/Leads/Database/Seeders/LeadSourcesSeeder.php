<?php

namespace App\Modules\Leads\Database\Seeders;

use App\Modules\Leads\Models\LeadSource;
use Illuminate\Database\Seeder;

class LeadSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $leadSources = [
            [
                'name' => 'Google AdWords',
            ],
            [
                'name' => 'Other Search Engines',
            ],
            [
                'name' => 'Google (organic)',
            ],
            [
                'name' => 'Social Media (Facebook, Twitter etc)',
            ],
            [
                'name' => 'Cold Calling/Telemarketing',
            ],
            [
                'name' => 'Advertising',
            ],
            [
                'name' => 'Custom Referral',
            ],
            [
                'name' => 'Expo/Seminar',
            ],
        ];
        foreach ($leadSources as $leadSource) {
            LeadSource::create($leadSource);
        }
    }
}
