<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();//レビューの主キー
            $table->string('post_content');//投稿内容
            $table->integer('score');//評価点
            $table->unsignedBigInteger('book_id');//外部キー
            $table->unsignedBigInteger('employee_id');//外部キー
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
