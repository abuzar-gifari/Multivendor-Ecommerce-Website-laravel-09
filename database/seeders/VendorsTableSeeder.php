<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords=[
            [
                "name"=>"Masud",	
                "address"=>"Mirpur",	
                "city"=>"Dhaka",	
                "state"=>"Dhaka",	
                "country"=>"Bangladesh",	
                "pincode"=>"1202",	
                "mobile"=>"01800000000",	
                "email"=>"masud@gmail.com",	
                "status"=>0,	
            ]   
        ];
        Vendor::insert($vendorRecords);
    }
}
