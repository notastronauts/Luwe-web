<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDistrictPostalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_district_postal_codes', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('postal_id');
            $table->unsignedBigInteger('sub_district_id');
            //$table->timestamps();

            $table->foreign('postal_id')
                ->references('id')
                ->on('postal_codes')
                ->onDelete('cascade');

            $table->foreign('sub_district_id')
                ->references('sub_district_id')
                ->on('sub_districts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_district_postal_codes');
    }
}
