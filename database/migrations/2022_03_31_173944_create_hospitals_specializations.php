<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsSpecializations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals_specializations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("specialist_id");

            $table->foreign("hospital_id")->references("id")->on("hospitals")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("specialist_id")->references("id")->on("specializations")->onDelete("CASCADE")->onUpdate("CASCADE");;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals_specializations');
    }
}
