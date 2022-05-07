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
                "id"=>1,
                "name"=>"Sk Md Abuzar Gifari",
                "type"=>"superadmin",
                "vendor_id"=>0,
                "mobile"=>"01783753653",
                "email"=>"admin@gmail.com",
                "password"=>Hash::make('12345'),
                "image"=>"",
                "status"=>1
            ]
        ];
        Admin::insert($adminRecords);
    }
}
