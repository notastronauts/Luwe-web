<?php

use App\City;
use App\SubDistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_districts')->delete();
        $json = File::get("database/data/sub_districts.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            $city = City::where('city_id', $obj->Parent)->firstOrFail();
            $sub_district = new SubDistrict;
            $sub_district->sub_district_id = $obj->Code;
            $sub_district->sub_district_name = $obj->Name;
            $city->sub_district()->save($sub_district);
        }
    }
}
