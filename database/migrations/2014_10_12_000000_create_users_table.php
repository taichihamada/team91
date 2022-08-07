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
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->increments('id')->comment('ID');
            $table->string('name')->comment('名前');
            $table->string('phone')->comment('電話番号');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->tinyInteger('userAuthority')->comment('ユーザー権限');

            $table->string('password',128)->nullable()->comment('パスワード');
            $table->string('reset_token',128)->nullable()->comment('リセットトークン');
            $table->datetime('created_at_token')->nullable()->comment('トークン発行日時');
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
