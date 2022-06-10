<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->unsignedBigInteger('id_prd'); 
            $table->unsignedBigInteger('attribute_id');
            $table->string('values') ;
            $table->foreign('id_prd')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('attribute_id')->references('id')->on('attribute') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_values');
    }
}
