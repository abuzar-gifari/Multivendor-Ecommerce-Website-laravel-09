<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords=[
            [
                "id"=>2,
                "name"=>"Masud",
                "type"=>"vendor",
                "vendor_id"=>1,
                "mobile"=>"01800000000",
                "email"=>"masud@gmail.com",
                "password"=>Hash::make('12345'),
                "image"=>"",
                "status"=>0
            ]
        ];
        Admin::insert($adminRecords);
    }
}
