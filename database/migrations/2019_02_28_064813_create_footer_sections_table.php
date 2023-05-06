<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_email_1');
            $table->string('f_email_2');
            $table->string('f_phone_1');
            $table->string('f_phone_2');
            $table->text('f_address');
            $table->text('f_content');
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
        Schema::dropIfExists('footer_sections');
    }
}
