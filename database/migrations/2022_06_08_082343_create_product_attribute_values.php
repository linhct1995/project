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
            $table->id();
            $table->unsignedBigInteger('id_prd'); 
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('values_id') ;
            $table->foreign('id_prd')->references('id')->on('products');
            $table->foreign('attribute_id')->references('id')->on('attribute') ;
            $table->foreign('values_id')->references('id')->on('attribute_values') ;
            $table->dropForeign('product_attribute_values_id_prd_foreign');
            $table->dropForeign('product_attribute_values_attribute_id_foreign');
            $table->dropForeign('product_attribute_values_values_id_foreign');
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
        Schema::dropIfExists('product_attribute_values');
    }
}
