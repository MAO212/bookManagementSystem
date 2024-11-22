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
        Schema::create('books', function (Blueprint $table) {
            $table->id();//書籍ID
            $table->string('book_name');//書籍名
            $table->string('author');//著者名
            $table->string('publisher_name');//出版社名
            $table->integer('price');//価格
            $table->string('img_link');//画像
            $table->string('ISBM')->unique();//ISBNの番号
            $table->timestamps();//時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
