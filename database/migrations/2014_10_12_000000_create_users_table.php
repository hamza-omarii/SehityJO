<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('national_id_number')->unique();
            $table->string('email')->unique();
            $table->char("phone_number", 10)->unique();
            $table->string('password');
            $table->date("date_birth");
            $table->enum("gender", ["male", "female"]);
            $table->enum("blood_type", ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']);
            $table->string("address", 255);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
