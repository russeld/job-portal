<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::create(['name' => 'Agriculture, Forestry and Fishing']);
        Industry::create(['name' => 'Mining']);
        Industry::create(['name' => 'Manufacturing']);
        Industry::create(['name' => 'Electricity, Gas, Water and Waste Services']);
        Industry::create(['name' => 'Construction']);
        Industry::create(['name' => 'Wholesale Trade']);
        Industry::create(['name' => 'Retail Trade']);
        Industry::create(['name' => 'Accommodation and Food Services']);
        Industry::create(['name' => 'Transport, Postal and Warehousing']);
        Industry::create(['name' => 'Information Media and Telecommunications']);
        Industry::create(['name' => 'Financial and Insurance Services']);
        Industry::create(['name' => 'Rental, Hiring and Real Estate Services']);
        Industry::create(['name' => 'Professional, Scientific and Technical Services']);
        Industry::create(['name' => 'Administrative and Support Services']);
        Industry::create(['name' => 'Public Administration and Safety']);
        Industry::create(['name' => 'Education and Training']);
        Industry::create(['name' => 'Health Care and Social Assistance']);
        Industry::create(['name' => 'Arts and Recreation Services']);
    }
}
