<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("doctor_id");

            $table->tinyInteger("floor")->unsigned();
            $table->integer("clinic_number")->unsigned();
            $table->char("phone_number", 10)->unique();
            $table->string("waiting_time");
            $table->string("address")->nullable();
            $table->tinyInteger("fees")->unsigned();

            $table->foreign("hospital_id")->references("id")->on("hospitals")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("doctor_id")->references("id")->on("doctors")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
