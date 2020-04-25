<?php

use App\StateAndProvince;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_and_provinces')->delete();
        $json = File::get("database/data/provinces.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            StateAndProvince::create(array(
                'province_id' => $obj->Code,
                'province_name' => $obj->Name,
            ));
        }
    }
}
