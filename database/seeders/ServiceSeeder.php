<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['category_id' => 1, 'name' => 'Bookkeeping'],
            ['category_id' => 1, 'name' => 'Tax Preparation'],
            ['category_id' => 2, 'name' => 'Graphic Design'],
            ['category_id' => 2, 'name' => 'Web Design'],
            // Add more services as needed
        ];

        // Insert data into the services table
        DB::table('services')->insert($services);
    }
    }

