<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasture_id');
            $table->string('gender')->default('male');
            $table->integer('age')->default(0);
            $table->integer('weight')->default(0);
            $table->string('health');
            $table->string('color');
            $table->double('price')->default(0.0);
            $table->timestamps();

            $table->foreign('pasture_id')->nullable()->references('id')->on('pastures')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('cattle');
    }
}
