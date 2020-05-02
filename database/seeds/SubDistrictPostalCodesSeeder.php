<?php

use App\PostalCode;
use App\SubDistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubDistrictPostalCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_districts = SubDistrict::get();
        foreach ($sub_districts as $sub_district) {
            $postal_codes = PostalCode::select()->where('sub_district', 'like', '%' .$sub_district->sub_district_name. '%')->get();
            $sub_district->postal_code()->attach($postal_codes);
        }
    }
}
