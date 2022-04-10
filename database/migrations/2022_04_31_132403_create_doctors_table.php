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
