<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("flat_id");
            $table->integer("benefits_id");
            $table->integer("pay_or_not");
            $table->string("date_paied");
            $table->integer("type1");
            $table->integer("type2");
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
        Schema::drop('flat_benefits');
    }
}
