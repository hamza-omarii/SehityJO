<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("specialist_id");
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->date("date_birth");
            $table->string('password');
            $table->tinyInteger("is_active")->default(0);
            $table->string("description", 300)->nullable();
            $table->enum("gender", ["male", "female"]);
            $table->string("image")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text("times_avilable")->default('["8am","8.20am","8.40am","9am","9.20am","9.40am","10am","10.20am","10.40am","11am","11.20am","11.40am","12pm","12.20pm","12.40pm","1pm","1.20pm","1.40pm","2pm","2.20pm","2.40pm","3pm","3.20pm","3.40pm","4pm","4.20pm","4.40pm","5pm","5.20pm","5.40pm","6pm","6.20pm","6.40pm","7pm","7.20pm","7.40pm","8pm","8.20pm","8.40pm","9pm","9.20pm","9.40pm"]');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("hospital_id")->references("id")->on("hospitals")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("specialist_id")->references("id")->on("specializations")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
