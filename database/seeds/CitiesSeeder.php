<?php

use App\City;
use App\StateAndProvince;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $json = File::get("database/data/cities.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            $province = StateAndProvince::where('province_id', $obj->Parent)->firstOrFail();
            $city = new City;
            $city->city_id = $obj->Code;
            $city->city_name = $obj->Name;
            $province->city()->save($city);
        }
    }
}
