<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacies_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('brand_id')->index();
            $table->integer('number');
            $table->timestamps();


            $table->foreign('pharmacies_id')->references('id')->on('pharmacies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_order_details');
    }
}
