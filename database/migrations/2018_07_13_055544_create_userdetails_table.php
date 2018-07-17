<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_names')->nullable();
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('alt_phone_number')->nullable();
            $table->string('next_kin_name')->nullable();
            $table->string('kin_phone_number')->nullable();
            $table->string('user_type');
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
        Schema::dropIfExists('userdetails');
    }
}
