<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name')->comment('イベント名');
            $table->tinyInteger('event_category')->comment('イベント種別');
            $table->text('overview')->comment('イベント詳細');            
            $table->datetime('event_date')->comment('開催日時');
            $table->string('place')->comment('場所');
            $table->integer('price')->comment('参加料金');
            $table->date('period_start')->comment('申込開始日');
            $table->date('period_end')->comment('申込締切日');
            $table->integer('user_id')->comment('ユーザー番号');                                   
            $table->tinyInteger('status')->comment('公開・非公開');
            $table->text('remarks')->comment('備考欄');
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
        Schema::dropIfExists('events');
    }
}
