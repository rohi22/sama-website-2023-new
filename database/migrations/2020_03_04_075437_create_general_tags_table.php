<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gt_title');
            $table->string('gt_desc');
            $table->string('gt_slug');
            $table->string('gt_og_img');
            $table->string('gt_icon');
            $table->string('gt_meta_desc');
            $table->string('gt_meta_key_words');
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
        Schema::dropIfExists('general_tags');
    }
}
