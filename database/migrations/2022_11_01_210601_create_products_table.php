<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('categoryId')->unsigned();
            $table->string('name');
            $table->text('shortDescription')->nullable();
            $table->longText('longDescription')->nullable();
            $table->integer('discountRate')->nullable();
            $table->float('price');
            $table->string('urlImage')->nullable();
            $table->string('unit')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('categoryId')->references('id')->on('product_categories')
                ->onUpdate('cascade');
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
}
