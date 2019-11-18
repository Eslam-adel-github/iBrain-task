<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->notNull();
            $table->string("address")->notNull();
            $table->string("email")->unique();
            $table->string("country")->notNull();
            $table->string("city")->notNull();
            $table->string("state")->notNull();
            $table->string("street_name")->notNull();
            $table->string("postcode")->notNull();
            $table->string("company")->notNull();
            $table->string("url");
            $table->string("phoneNumber")->notNull();
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
        Schema::drop('hotels');
    }
}
