<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankTableSeeder extends Seeder
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
                'account_holder_name'=>"Masud Vai",	
                'bank_name'=>"Islami Bank",	
                'account_number'	=>"686869790",
                'bank_ifsc_code'=>"57575",
            ]
        ];
        VendorsBankDetails::insert($vendorRecords);
    }
}
