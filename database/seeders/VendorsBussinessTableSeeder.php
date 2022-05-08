<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBussinessTableSeeder extends Seeder
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
                'vendor_id'=>1,
                'shop_name'=>"Masud Electronics Store",	
                'shop_address'=>"Mirpur",	
                'shop_city'	=>"Dhaka",
                'shop_state'=>"Dhaka",
                'shop_country'	=>"Bangladesh",
                'shop_pincode'	=>"1202",
                'shop_mobile'=>"01800000000",
                'shop_website'=>"masud-electronics-store.com",	
                'shop_email'=>"masudshop@gmail.com",
                'address_proof'	=>"Passport",
                'address_proof_image'=>"test.jpg",	
                'business_license_number'=>"1290876522",	
                'gst_number'=>"467897990",
                'pan_number'=>"896756464"
            ]
        ];
        VendorsBusinessDetails::insert($vendorRecords);
    }
}
