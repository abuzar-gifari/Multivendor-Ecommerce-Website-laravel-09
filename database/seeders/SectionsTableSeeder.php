<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionRecords=[
            ["name"=>"Clothing","status"=>1],
            ["name"=>"Electronics","status"=>1],
            ["name"=>"Appliances","status"=>1],
        ];

        Section::insert($sectionRecords);
    }
}
