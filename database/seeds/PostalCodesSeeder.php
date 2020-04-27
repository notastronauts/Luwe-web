<?php

use App\PostalCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostalCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postal_codes')->delete();
        $json = File::get("database/data/postal_array.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            $postal = new PostalCode;
            $postal->urban = $obj->urban;
            $postal->postal_code = $obj->postal_code;
            $postal->sub_district = $obj->sub_district;
            $postal->save();
        }
    }
}
