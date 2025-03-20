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
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // id (自動採番)
            $table->unsignedBigInteger('product_id'); // 商品ID（外部キー）
            $table->integer('quantity'); // 販売数量
            $table->integer('total_price'); // 合計金額
            $table->timestamps(); // created_at, updated_at

            // 外部キー制約
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
