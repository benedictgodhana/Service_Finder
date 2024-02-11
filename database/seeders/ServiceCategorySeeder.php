<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Accounting', 'image' => 'images/service_categories/finance.png'],
            ['name' => 'Design/Creative', 'image' => 'images/service_categories/design.png'],
            ['name' => 'Programmer', 'image' => 'images/service_categories/programmer.png'],
            ['name' => 'Production', 'image' => 'images/service_categories/production.png'],
            ['name' => 'Education', 'image' => 'images/service_categories/education.png'],
            ['name' => 'Consultancy', 'image' => 'images/service_categories/consultancy.png']
            // Add more categories as needed
        ];
        

        // Insert data into the service_categories table
        DB::table('service_categories')->insert($categories);
    }
}
