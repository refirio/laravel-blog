<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 85)->comment('名前');
            $table->string('email', 85)->unique()->comment('メールアドレス');
            $table->string('password', 60)->comment('パスワード');
            $table->rememberToken();
            $table->timestamps();
        });
        if (!app()->runningUnitTests()) {
            DB::statement('ALTER TABLE users COMMENT \'ユーザ\'');
        }
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
