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
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->foreignId('generic_id')->constrained('generics')
                  ->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('brand_id')->constrained('brands')
                  ->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('product_category_id')->constrained('product_categories')
                  ->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('dosage_form_id')->constrained('dosage_forms')
                  ->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('strength')->nullable();
            $table->decimal('mrp', 20,2)->default(0)->nullable();
            $table->string('pack_size')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
