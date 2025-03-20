<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id (BIGINT AUTO_INCREMENT PRIMARY KEY)
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // 外部キー
            $table->string('product_name'); // 商品名
            $table->integer('price'); // 価格
            $table->integer('stock'); // 在庫数
            $table->text('comment')->nullable(); // コメント（任意）
            $table->string('img_path')->nullable(); // 画像パス（任意）
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
