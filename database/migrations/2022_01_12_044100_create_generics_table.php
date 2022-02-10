<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $status = config('enum.status');
        Schema::create('generics', function (Blueprint $table) use ($status){
            $table->id();
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('description', 1024)->nullable();
            $table->enum('status', $status)->nullable()->default('draft');
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
        Schema::dropIfExists('generics');
    }
}
