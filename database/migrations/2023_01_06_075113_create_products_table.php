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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('tên sản phẩm');
            $table->integer('cate_id')->comment('id danh mục');
            $table->string('price')->comment('giá bán');
            $table->string('cost_price')->comment('giá vốn');
            $table->string('barcode')->comment('số mã vạch');
            $table->string('sku')->comment('mã sản phẩm sku');
            $table->integer('trademark_id')->comment('id thương hiệu');
            $table->integer('origin_id')->comment('id xuất xứ');
            $table->integer('status')->comment('0 hết hàng, 1 còn hàng');
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
        Schema::dropIfExists('products');
    }
};
