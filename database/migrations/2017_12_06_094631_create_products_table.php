<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->text('content');
            $table->string('sku')->nullable();
            $table->string('images')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('product_id', false, true);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->string('sku')->nullable();
            $table->string('images')->nullable();
            $table->string('attribute_color')->nullable();
            $table->string('attribute_size')->nullable();
            $table->string('attribute_style')->nullable();
            $table->bigInteger('price', false, true)->default(0);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('product_attributes');
    }
}
