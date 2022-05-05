<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            //$table->型番(カラム名)
            $table->increments('id');//ID
            $table->integer('folder_id')->insigned();//フォルダID
            $table->string('title',100);//タイトル
            $table->date('due_date');//期限日
            $table->integer('status')->default(1);//状態
            $table->timestamps();//作成日

            //外部キー設定
            $table->foreign('folder_id')
            ->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
