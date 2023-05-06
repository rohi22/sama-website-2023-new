<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('s_1_name');
            $table->string('s_1_email');
            $table->string('s_1_phone');
            $table->string('s_2_name');
            $table->string('s_2_email');
            $table->string('s_2_phone');
            $table->string('s_3_name');
            $table->string('s_3_email');
            $table->string('s_3_phone');
            $table->string('s_4_name');
            $table->string('s_4_email');
            $table->string('s_4_phone');
            $table->string('s_4_address');
            $table->string('s_4_title');
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
        Schema::dropIfExists('contact_pages');
    }
}
