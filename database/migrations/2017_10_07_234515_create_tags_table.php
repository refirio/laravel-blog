<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('タグ');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('entry_tag', function(Blueprint $table)
        {
            $table->integer('entry_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->foreign('entry_id')->references('id')->on('entries')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('entry_tag');
    }
}
