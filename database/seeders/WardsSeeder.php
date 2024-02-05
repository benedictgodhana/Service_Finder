<?php

namespace Database\Seeders;
use App\Models\Ward;
use App\Models\Subcounty;


use Illuminate\Database\Seeder;

class WardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wards = [
            // Wards for Mvita Subcounty
            [
                'ward_name' => 'Tudor Ward ',
                'subcounty_id' => Subcounty::where('subcounty_id', '348')->first()->id,
            ],
            [
                'ward_name' => 'Mji wa Kale / Makadara Ward ',
                'subcounty_id' => Subcounty::where('subcounty_id', '348')->first()->id,
            ],

            [
                'ward_name' => 'Tononoka Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '348')->first()->id,
            ],
            [
                'ward_name' => 'Shimanzi / Ganjoni Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '348')->first()->id,
            ],
            [
                'ward_name' => 'Majengo Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '348')->first()->id,
            ],
            // Add more wards for other subcounties

            // Wards for Lungalunga Subcounty
            [
                'ward_name' => 'Pongwe Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '354')->first()->id,
            ],
            [
                'ward_name' => 'Dzombo Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '354')->first()->id,
            ],
            [
                'ward_name' => 'Mwereni Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '354')->first()->id,
            ],
            [
                'ward_name' => 'Vanga Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '354')->first()->id,
            ],
            // Add more wards for other subcounties
            [
                'ward_name' => 'Nairobi West Ward ',
                'subcounty_id' => Subcounty::where('subcounty_id', '403')->first()->id,
            ],
            [
                'ward_name' => 'South C Ward ',
                'subcounty_id' => Subcounty::where('subcounty_id', '403')->first()->id,
            ],
            [
                'ward_name' => 'Highrise Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '403')->first()->id,
            ],
            [
                'ward_name' => 'Mugumoini Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '403')->first()->id,
            ],
            [
                'ward_name' => 'Karen Ward',
                'subcounty_id' => Subcounty::where('subcounty_id', '403')->first()->id,
            ],

            // Add more wards as needed
        ];

        foreach ($wards as $wardData) {
            Ward::create($wardData);
        }
    }
    }

