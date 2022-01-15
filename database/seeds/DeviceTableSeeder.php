<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices_name  = ['PC','Ps4','Xbox','Swithc'];
        foreach ($devices_name as $device_name){
            DB::table('devices')->insert([
            'device_name' => $device_name,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
