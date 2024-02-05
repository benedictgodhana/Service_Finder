<?php

namespace Database\Seeders;
use App\Models\Subcounty;
use App\Models\County;

use Illuminate\Database\Seeder;

class SubCountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcounties = [

            //Sub-counties in Mombasa
            [
                'subcounty_name' => 'Mvita',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],
            [
                'subcounty_name' => 'Changamwe',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],
            [
                'subcounty_name' => 'Kiasauni',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],
            [
                'subcounty_name' => 'Jomvu',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],
            [
                'subcounty_name' => 'Nyali',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],
            [
                'subcounty_name' => 'Likoni',
                'county_id' => County::where('county_code', '001')->first()->id,
            ],

            //Sub-counties in Kwale
            [
                'subcounty_name' => 'Lungalunga',
                'county_id' => County::where('county_code', '002')->first()->id,
            ],
            [
                'subcounty_name' => 'Msambweni',
                'county_id' => County::where('county_code', '002')->first()->id,
            ],
            [
                'subcounty_name' => 'Matuga',
                'county_id' => County::where('county_code', '002')->first()->id,
            ],
            [
                'subcounty_name' => 'Kinango',
                'county_id' => County::where('county_code', '002')->first()->id,
            ],
                        //subcounties in Kilifi

            [
                'subcounty_name' => 'Kilfi North',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Kilfi South',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Ganze',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Kaloleni',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Malindi',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Magarini',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],
            [
                'subcounty_name' => 'Rabai',
                'county_id' => County::where('county_code', '003')->first()->id,
            ],

            // Sub-counties in Tanariver
            [
                'subcounty_name' => 'Hola',
                'county_id' => County::where('county_code', '004')->first()->id,
            ],
            [
                'subcounty_name' => 'Galole',
                'county_id' => County::where('county_code', '004')->first()->id,
            ],
            [
                'subcounty_name' => 'Garsen',
                'county_id' => County::where('county_code', '004')->first()->id,
            ],

            //Sub-counties in Lamu
            [
                'subcounty_name' => 'Lamu East',
                'county_id' => County::where('county_code', '005')->first()->id,
            ],
            [
                'subcounty_name' => 'Lamu West',
                'county_id' => County::where('county_code', '005')->first()->id,
            ],
            
            //Sub-counties in Taita Taveta
            [
                'subcounty_name' => 'Mwatate',
                'county_id' => County::where('county_code', '006')->first()->id,
            ],
            [
                'subcounty_name' => 'Taveta',
                'county_id' => County::where('county_code', '006')->first()->id,
            ],
            [
                'subcounty_name' => 'Voi',
                'county_id' => County::where('county_code', '006')->first()->id,
            ],
            [
                'subcounty_name' => 'Wundanyi',
                'county_id' => County::where('county_code', '006')->first()->id,
            ],
            
            //Suv-counties in Garissa

            [
                'subcounty_name' => 'Daadab',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Fafi',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Garissa Township',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Hulugho',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Ijara',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Lagdera',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],
            [
                'subcounty_name' => 'Balambala',
                'county_id' => County::where('county_code', '007')->first()->id,
            ],

            //Sub-Counties in Wajir
            [
                'subcounty_name' => 'Eldas',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],
            [
                'subcounty_name' => 'Tarbaj',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],
            [
                'subcounty_name' => 'Wajir East',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],
            [
                'subcounty_name' => 'Wajir North',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],
            [
                'subcounty_name' => 'Wajir South',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],
            [
                'subcounty_name' => 'Wajir West',
                'county_id' => County::where('county_code', '008')->first()->id,
            ],

            // Sub-Counties in Mandera
            [
                'subcounty_name' => 'Banissa',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],
            [
                'subcounty_name' => 'Lafey',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],
            [
                'subcounty_name' => 'Mandera East',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],
            [
                'subcounty_name' => 'Mandera North',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],
            [
                'subcounty_name' => 'Mandera South',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],
            [
                'subcounty_name' => 'Mandera West',
                'county_id' => County::where('county_code', '009')->first()->id,
            ],

            //Sub-counties in Nairobi
            [
                'subcounty_name' => 'Dagoretti North',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Dagoretti South',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Embakasi Central',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Embakasi East',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Embakasi North',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Embakasi South',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Embakasi West',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Kamukunji',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Kasarani',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Kibra',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Lang’ata',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Makadara',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Mathare',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Roysambu',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Ruaraka',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Starehe',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            [
                'subcounty_name' => 'Westlands',
                'county_id' => County::where('county_code', '047')->first()->id,
            ],
            
            



        ];

        foreach ($subcounties as $subCountyData) {
            Subcounty::create($subCountyData);
        }
    }
    }

