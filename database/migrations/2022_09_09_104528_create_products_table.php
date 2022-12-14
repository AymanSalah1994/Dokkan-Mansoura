<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description');
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->string('product_picture')->nullable();
            $table->string('secondary_picture')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
            $table->tinyInteger('trending')->default('0')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->string('youtube_vid')->nullable();
            $table->tinyInteger('refundable')->default('1')->nullable() ;
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
