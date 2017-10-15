<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('entry_id', false, true);
            $table->string('name', 85)->nullable()->comment('名前');
            $table->text('comment')->comment('コメント');
            $table->timestamps();
        });
        if (!app()->runningUnitTests()) {
            DB::statement('ALTER TABLE comments COMMENT \'コメント\'');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
