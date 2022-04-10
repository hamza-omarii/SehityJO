<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("doctor_id");
            $table->date("booking_date");
            $table->time("start_at");
            $table->time("end_at");
            $table->timestamps();

            $table->foreign("hospital_id")->references("id")->on("hospitals");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("doctor_id")->references("id")->on("doctors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
